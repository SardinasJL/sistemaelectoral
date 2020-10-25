<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use DB;
use App\Models\Acta;
use App\Models\Integrante;
use App\Models\Mesa;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    private $arrayMesas = array(
        array(
            "numero" => "1",
            "ubicacion" => "USFA"
        ),
        array(
            "numero" => "2",
            "ubicacion" => "Escuela Ayacucho"
        ),
        array(
            "numero" => "3",
            "ubicacion" => "Colegio Antofagasta"
        )
    );

    private $arrayIntegrantes = array(
        array(
            "ci" => "1234567",
            "nombres" => "Juan",
            "apellidos" => "Pérez",
            "rol" => "Presidente",
            "mesa_id" => "1"
        ),
        array(
            "ci" => "1234568",
            "nombres" => "Jorge",
            "apellidos" => "Campos",
            "rol" => "Presidente",
            "mesa_id" => "2"
        ),
        array(
            "ci" => "1234568",
            "nombres" => "Ramiro",
            "apellidos" => "Ramírez",
            "rol" => "Secretario",
            "mesa_id" => "2"
        )
    );



    private $arrayActas = array(
        array(
            "fecha" => "30-12-20",
            "horainicio" => "08:30",
            "horafin" => "15:30",
            "lista1" => "50",
            "lista2" => "60",
            "lista3" => "70",
            "blancos" => "1",
            "nulos" => "2",
            "total" => "183",
            "observaciones" => "ninguna",
            "mesa_id" => "1"
        ),
        array(
            "fecha" => "29-12-20",
            "horainicio" => "08:30",
            "horafin" => "15:30",
            "lista1" => "10",
            "lista2" => "20",
            "lista3" => "30",
            "blancos" => "5",
            "nulos" => "5",
            "total" => "70",
            "observaciones" => "ninguna",
            "mesa_id" => "2"
        )
    );

    private $arrayUsuarios = array(
        array(
            "name" => "admin",
            "email" => "admin@gmail.com",
            "password" => "admin"
        )
    );


    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        self::seedMesas();
        $this->command->info("Tabla mesas inicializada con éxito");

        self::seedIntegrantes();
        $this->command->info("Tabla integrantes inicializada con éxito");

        self::seedActas();
        $this->command->info("Tabla actas inicializada con éxito");

        self::seedUsuarios();
        $this->command->info("Tabla usuarios inicializada con éxito");


    }

    public function seedMesas()
    {
        DB::table("mesas")->delete();
        foreach ($this->arrayMesas as $mesa) {
            $p = new Mesa;
            $p->numero = $mesa["numero"];
            $p->ubicacion = $mesa["ubicacion"];
            $p->save();
        }
    }

    public function seedIntegrantes()
    {
        DB::table("integrantes")->delete();
        foreach ($this->arrayIntegrantes as $integrante) {
            $p = new Integrante;
            $p->ci = $integrante["ci"];
            $p->nombres = $integrante["nombres"];
            $p->apellidos = $integrante["apellidos"];
            $p->rol = $integrante["rol"];
            $p->mesa_id = $integrante["mesa_id"];
            $p->save();
        }
    }

    public function seedActas()
    {
        DB::table("actas")->delete();
        foreach ($this->arrayActas as $acta) {
            $p = new Acta;
            $p->fecha = $acta["fecha"];
            $p->horainicio = $acta["horainicio"];
            $p->horafin = $acta["horafin"];
            $p->lista1 = $acta["lista1"];
            $p->lista2 = $acta["lista2"];
            $p->lista3 = $acta["lista3"];
            $p->blancos = $acta["blancos"];
            $p->nulos = $acta["nulos"];
            $p->total = $acta["total"];
            $p->observaciones = $acta["observaciones"];
            $p->mesa_id = $acta["mesa_id"];
            $p->save();
        }
    }

    public function seedUsuarios()
    {
        DB::table("users")->delete();
        foreach ($this->arrayUsuarios as $usuario){
            $p = new User();
            $p->name = $usuario["name"];
            $p->email = $usuario["email"];
            $p->password = bcrypt($usuario["password"]);
            $p->save();
        }
    }
}
