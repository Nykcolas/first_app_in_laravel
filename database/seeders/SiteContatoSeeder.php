<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\siteContato;
class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $SiteContato = new siteContato();
        $SiteContato->nome = "Empresa";
        $SiteContato->telefone = "(83) 8844-1519";
        $SiteContato->email = "Empresa@contato.com";
        $SiteContato->motivo_contato = 1;
        $SiteContato->mensagem = "Eu preciso de Ajuda, estou com problemas grandes com meus funcionarios";
        $SiteContato->save();
        
        $SiteContato = new siteContato();
        $SiteContato->nome = "Empresa ";
        $SiteContato->telefone = "(83) 98844-1519";
        $SiteContato->email = "Empresa2@contato.com";
        $SiteContato->motivo_contato = 2;
        $SiteContato->mensagem = "Deficitario";
        $SiteContato->save();
    }
}
