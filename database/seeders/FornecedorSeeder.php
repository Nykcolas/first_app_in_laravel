<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Fornecedor = new Fornecedor();
        $Fornecedor->nome = "Fornecedor 110";
        $Fornecedor->site = "Fornecedor100.com";
        $Fornecedor->uf = "CE";
        $Fornecedor->email = "Fornecedor100@contato.com.br";
        $Fornecedor->save();

        Fornecedor::create([
            "nome"=>"Fornecedor Nycolas",
            "site"=>"fornecedornycolas.com",
            "uf"=>"RS",
            "email"=>"fornecedornycolas@contato.com",
        ]);
    }
}
