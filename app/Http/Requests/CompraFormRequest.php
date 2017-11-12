<?php

namespace staradmin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CompraFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'idproveedor'=>'required',
            'tipo_doc'=>'required|max:2',
            'serie_doc'=>'max:4',
            'numero_doc'=>'required|max:8',
            'idarticulo'=>'required',
            'cantidad'=>'required',
            'precio_compra'=>'required',
            'precio_venta'=>'required',
            'fecha_hora'=>'required'
        ];
    }
}
