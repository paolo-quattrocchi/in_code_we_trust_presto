<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEcommercePost extends FormRequest
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
            'title' => 'required | max:25',
            'description' => 'required | min:50',
            'price' => 'required | max:8',
            'image' => 'required  | image | max:600',
            'category_id' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'title.required' => 'Titolo obbligatorio',
            'description.required' => 'Descrizione obbligatoria',
            'price.required' => 'Prezzo obbligatorio',
            'image.required' => 'Inserisci immagine',
            'title.max' => 'Titolo troppo lungo massimo 25 caratteri',
            'description.min' => 'Descrizione troppo corta minimo 50 caratteri',
            'image.image' => 'L\'immgine deve essere una png, jpeg',
            'image.max' => 'L\'immagine deve essere massimo di 600kb',
            'price.max' => 'Non sparare minchiate',
        ];
    }
}
