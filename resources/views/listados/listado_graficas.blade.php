@extends('layouts.admin')
@section('contenido')
	<?php  $nombreMes=array("","ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE") ?>

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<label for="">Año</label>
			<select id="anio_sel" class="form-control" onchange="cambiar_fecha_grafica();">
				<?php echo '<option value="'.$anio.'">'.$anio.'</option>'; ?>
				<option value="2015">2015</option>
				<option value="2016">2016</option>
				<option value="2017">2017</option>
				<option value="2018">2018</option>
				<option value="2019">2019</option>
				<option value="2020">2020</option>
			</select>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<label for="">Mes</label>
			<select id="mes_sel" class="form-control" onchange="cambiar_fecha_grafica();">
				<?php echo '<option value="'.$mes.'">'.$nombreMes[intval($mes)].'</option>'; ?>
				<option value="1">ENERO</option>
				<option value="2">FEBRERO</option>
				<option value="3">MARZO</option>
				<option value="4">ABRIL</option>
				<option value="5">MAYO</option>
				<option value="6">JUNIO</option>
				<option value="7">JULIO</option>
				<option value="8">AGOSTO</option>
				<option value="9">SEPTIEMBRE</option>
				<option value="10">OCTUBRE</option>
				<option value="11">NOVIEMBRE</option>
				<option value="12">DICIEMBRE</option>
			</select>
		</div>
	</div>
	<div class="row">
		<br>
		<div class="box box-primary" style="min-width: 300px; height: 430px; margin: 0 auto">
			<div class="box-header"></div>
			<div class="box-bady" id="div_grafica_barras"></div>
			<div class="box-footer"></div>
		</div>
		<div class="box box-primary" style="min-width: 300px; height: 430px; margin: 0 auto">
			<div class="box-header"></div>
			<div class="box-bady" id="div_grafica_barras_c"></div>
			<div class="box-footer"></div>
		</div>
		<div class="box box-primary">
			<div class="box-header"></div>
			<div class="box-bady" id="div_grafica_pie"></div>
			<div class="box-footer"></div>
		</div>
	</div>
	@push('scripts')
	<script>
		carga_grafica_barra_venta(<?=$anio; ?>,<?=intval($mes); ?>);
		carga_grafica_barra_compra(<?=$anio; ?>,<?=intval($mes); ?>);
		//cargar_grafica_pie();
		

		function cambiar_fecha_grafica(){
			var anio_sel=$("#anio_sel").val();
			var mes_sel=$("#mes_sel").val();
			carga_grafica_barra_venta(anio_sel,mes_sel);
			carga_grafica_barra_compra(anio_sel,mes_sel);
		}

		function carga_grafica_barra_venta(anio,mes){
			var options={
				chart:{
					renderTo: 'div_grafica_barras',type: 'column'
				},
				title: {
					text: 'Numero de Registro Venta en el Mes'
				},
				subtitle: {
					text: ''
				},
				xAxis: {
					categories: [],title: {
						text: 'dias del mes'
					},
					crosshair: true
				},
				yAxis: {
					min: 0,
					title: {
						text: 'REGISTRO DE DIA'
					}
				},
				tooltip: {
					headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
					pointFormat: '<tr><td style="color:{series.color}:padding:0">{series.name}:</td>' +
						'<td style="padding:0"><b>{point.y}</b></td></tr>',
					footerFormat: '</table>',
					shared: true,
					useHTML: true	
				},
				plotOptions: {
					column: {
						pointPadding: 0.2,
						borderWidth: 0
					}
				},
				series: [{
					name: 'registros',
					data: []
				}]		

			}
			var url = "grafica_registro/"+anio+"/"+mes+"";
			$.get(url,function(resul){
				var datos=jQuery.parseJSON(resul);
				var totaldias=datos.totaldias;
				var registrosdia=datos.registrosdia;
				var i=0;
					for(i=1;i<=totaldias;i++){
						options.series[0].data.push(registrosdia[i]);
						options.xAxis.categories.push(i);
					}
				//options.title.text="aui e podra cambair el titiulo dinamicamente"
				chart= new Highcharts.Chart(options);	
			})
		}

		function carga_grafica_barra_compra(anio,mes){
			var options={
				chart:{
					renderTo: 'div_grafica_barras_c',type: 'column'
				},
				title: {
					text: 'Numero de Registro de Compra en el Mes'
				},
				subtitle: {
					text: ''
				},
				xAxis: {
					categories: [],title: {
						text: 'dias del mes'
					},
					crosshair: true
				},
				yAxis: {
					min: 0,
					title: {
						text: 'REGISTRO DE DIA'
					}
				},
				tooltip: {
					headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
					pointFormat: '<tr><td style="color:{series.color}:padding:0">{series.name}:</td>' +
						'<td style="padding:0"><b>{point.y}</b></td></tr>',
					footerFormat: '</table>',
					shared: true,
					useHTML: true	
				},
				plotOptions: {
					column: {
						pointPadding: 0.2,
						borderWidth: 0
					}
				},
				series: [{
					name: 'registros',
					data: []
				}]		

			}
			var url = "grafica_registro_c/"+anio+"/"+mes+"";
			$.get(url,function(resul){
				var datos=jQuery.parseJSON(resul);
				var totaldias=datos.totaldias;
				var registrosdia=datos.registrosdia;
				var i=0;
					for(i=1;i<=totaldias;i++){
						options.series[0].data.push(registrosdia[i]);
						options.xAxis.categories.push(i);
					}
				//options.title.text="aui e podra cambair el titiulo dinamicamente"
				chart= new Highcharts.Chart(options);	
			})
		}
	</script>	
	@endpush
@endsection