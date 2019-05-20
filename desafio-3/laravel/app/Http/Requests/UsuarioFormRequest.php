<?php

/**
 * Created by PhpStorm.
 * User: nelson
 * Date: 20/05/19
 * Time: 01:01
 */
namespace App\Http\Requests;




class UsuarioFormRequest  extends Request{

    public function authorize() {
        return true;
    }

    public function messages() {

        return [
            'nome.required' => 'O campo nome não pode ser vazio',
            'email.unique' => 'O valor indicado para o campo de email já se encontra utilizado.',
            'senha.min' => 'Senha minimo 6 caracteres.'
        ];

    }

    public function rules() {

        return array(
            "nome" => "required|max:255",
            "email" => "required|email|unique",
            "senha" => "required_without:id|min:6",
            "data_nascimento" => "required|date",
        );
    }


}