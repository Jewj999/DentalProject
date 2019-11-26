<?php

use Illuminate\Database\Seeder;

class MunicipalitiesTableSeeder extends Seeder
{
    public function run()
    {
        $table = 'municipalities';
        //Ahuachapan 1
        DB::table($table)->insert([
            [
                'department_id' => 1,
                'name' => 'Ahuachapán'
            ],
            [
                'department_id' => 1,
                'name' => 'Apaneca'
            ],
            [
                'department_id' => 1,
                'name' => 'Atiquizaya'
            ],
            [
                'department_id' => 1,
                'name' => 'Concepción de Ataco'
            ],
            [
                'department_id' => 1,
                'name' => 'El Refugio'
            ],
            [
                'department_id' => 1,
                'name' => 'Guaymango'
            ],
            [
                'department_id' => 1,
                'name' => 'Jujutla'
            ],
            [
                'department_id' => 1,
                'name' => 'San Francisco Menéndez'
            ],
            [
                'department_id' => 1,
                'name' => 'San Lorenzo'
            ],
            [
                'department_id' => 1,
                'name' => 'San Pedro Puxtla'
            ],
            [
                'department_id' => 1,
                'name' => 'Tacuba'
            ],
            [
                'department_id' => 1,
                'name' => 'Turín'
            ]
        ]);
        //Cabañas 2
        DB::table($table)->insert([
            [
                'department_id' => 2,
                'name' => 'Cinquera'
            ],
            [
                'department_id' => 2,
                'name' => 'Dolores'
            ],
            [
                'department_id' => 2,
                'name' => 'Guacotecti'
            ],
            [
                'department_id' => 2,
                'name' => 'Ilobasco'
            ],
            [
                'department_id' => 2,
                'name' => 'Jutiapa'
            ],
            [
                'department_id' => 2,
                'name' => 'San Isidro'
            ],
            [
                'department_id' => 2,
                'name' => 'Sensuntepeque'
            ],
            [
                'department_id' => 2,
                'name' => 'Tejutepeque'
            ],
            [
                'department_id' => 2,
                'name' => 'Victoria'
            ]
        ]);
        //Chalatenango 3
        DB::table($table)->insert([
            [
                'department_id' => 3,
                'name' => 'Agua Caliente'
            ],
            [
                'department_id' => 3,
                'name' => 'Arcatao'
            ],
            [
                'department_id' => 3,
                'name' => 'Azacualpa'
            ],
            [
                'department_id' => 3,
                'name' => 'Chalatenango'
            ],
            [
                'department_id' => 3,
                'name' => 'Comalapa'
            ],
            [
                'department_id' => 3,
                'name' => 'Citalá'
            ],
            [
                'department_id' => 3,
                'name' => 'Concepción Quezaltepeque'
            ],
            [
                'department_id' => 3,
                'name' => 'Dulce Nombre de María'
            ],
            [
                'department_id' => 3,
                'name' => 'El Carrizal'
            ],
            [
                'department_id' => 3,
                'name' => 'El Paraíso'
            ],
            [
                'department_id' => 3,
                'name' => 'La Laguna'
            ],
            [
                'department_id' => 3,
                'name' => 'La Palma'
            ],
            [
                'department_id' => 3,
                'name' => 'La Reina'
            ],
            [
                'department_id' => 3,
                'name' => 'Las Vueltas'
            ],
            [
                'department_id' => 3,
                'name' => 'Nueva Concepción'
            ],
            [
                'department_id' => 3,
                'name' => 'Nueva Trinidad'
            ],
            [
                'department_id' => 3,
                'name' => 'Nombre de Jesús'
            ],
            [
                'department_id' => 3,
                'name' => 'Ojos de Agua'
            ],
            [
                'department_id' => 3,
                'name' => 'Potonico'
            ],
            [
                'department_id' => 3,
                'name' => 'San Antonio Los Ranchos'
            ],
            [
                'department_id' => 3,
                'name' => 'San Fernando'
            ],
            [
                'department_id' => 3,
                'name' => 'San Francisco Lempa'
            ],
            [
                'department_id' => 3,
                'name' => 'San Francisco Morazán'
            ],
            [
                'department_id' => 3,
                'name' => 'San Ignacio'
            ],
            [
                'department_id' => 3,
                'name' => 'San Isidro Labrador'
            ],
            [
                'department_id' => 3,
                'name' => 'San José Cancasque'
            ],
            [
                'department_id' => 3,
                'name' => 'San José Las Flores'
            ],
            [
                'department_id' => 3,
                'name' => 'San Luis del Carmen'
            ],
            [
                'department_id' => 3,
                'name' => 'San Miguel de Mercedes'
            ],
            [
                'department_id' => 3,
                'name' => 'San Rafael'
            ],
            [
                'department_id' => 3,
                'name' => 'Santa Rita'
            ],
            [
                'department_id' => 3,
                'name' => 'Tejutla'
            ]
        ]);
        //Cuscatlan 4
        DB::table($table)->insert([
            [
                'department_id' => 4,
                'name' => 'Candelaria'
            ],
            [
                'department_id' => 4,
                'name' => 'Cojutepeque'
            ],
            [
                'department_id' => 4,
                'name' => 'El Carmen'
            ],
            [
                'department_id' => 4,
                'name' => 'El Rosario'
            ],
            [
                'department_id' => 4,
                'name' => 'Monte San Juan'
            ],
            [
                'department_id' => 4,
                'name' => 'Oratorio de Concepción'
            ],
            [
                'department_id' => 4,
                'name' => 'San Bartolomé Perulapía'
            ],
            [
                'department_id' => 4,
                'name' => 'San Cristóbal'
            ],
            [
                'department_id' => 4,
                'name' => 'San José Guayabal'
            ],
            [
                'department_id' => 4,
                'name' => 'San Pedro Perulapán'
            ],
            [
                'department_id' => 4,
                'name' => 'San Rafael Cedros'
            ],
            [
                'department_id' => 4,
                'name' => 'San Ramón'
            ],
            [
                'department_id' => 4,
                'name' => 'Santa Cruz Analquito'
            ],
            [
                'department_id' => 4,
                'name' => 'Santa Cruz Michapa'
            ],
            [
                'department_id' => 4,
                'name' => 'Suchitoto'
            ],
            [
                'department_id' => 4,
                'name' => 'Tenancingo'
            ]
        ]);
        //La Libertad 5
        DB::table($table)->insert([
            [
                'department_id' => 5,
                'name' => 'Antiguo Cuscatlán'
            ],
            [
                'department_id' => 5,
                'name' => 'Chiltiupán'
            ],
            [
                'department_id' => 5,
                'name' => 'Ciudad Arce'
            ],
            [
                'department_id' => 5,
                'name' => 'Colón'
            ],
            [
                'department_id' => 5,
                'name' => 'Comasagua'
            ],
            [
                'department_id' => 5,
                'name' => 'Huizúcar'
            ],
            [
                'department_id' => 5,
                'name' => 'Jayaque'
            ],
            [
                'department_id' => 5,
                'name' => 'Jicalapa'
            ],
            [
                'department_id' => 5,
                'name' => 'La Libertad'
            ],
            [
                'department_id' => 5,
                'name' => 'Santa Tecla'
            ],
            [
                'department_id' => 5,
                'name' => 'Nuevo Cuscatlán'
            ],
            [
                'department_id' => 5,
                'name' => 'San Juan Opico'
            ],
            [
                'department_id' => 5,
                'name' => 'Quezaltepeque'
            ],
            [
                'department_id' => 5,
                'name' => 'Sacacoyo'
            ],
            [
                'department_id' => 5,
                'name' => ' San José Villanueva'
            ],
            [
                'department_id' => 5,
                'name' => 'San Matías'
            ],
            [
                'department_id' => 5,
                'name' => 'San Pablo Tacachico'
            ],
            [
                'department_id' => 5,
                'name' => 'Talnique'
            ],
            [
                'department_id' => 5,
                'name' => 'Tamanique'
            ],
            [
                'department_id' => 5,
                'name' => 'Teotepeque'
            ],
            [
                'department_id' => 5,
                'name' => 'Tepecoyo'
            ],
            [
                'department_id' => 5,
                'name' => 'Zaragoza'
            ]
        ]);
        //La Paz 6
        DB::table($table)->insert([
            [
                'department_id' => 6,
                'name' => 'Cuyultitán'
            ],
            [
                'department_id' => 6,
                'name' => 'El Rosario'
            ],
            [
                'department_id' => 6,
                'name' => 'Jerusalén'
            ],
            [
                'department_id' => 6,
                'name' => 'Mercedes La Ceiba'
            ],
            [
                'department_id' => 6,
                'name' => 'Olocuilta'
            ],
            [
                'department_id' => 6,
                'name' => 'Paraíso de Osorio'
            ],
            [
                'department_id' => 6,
                'name' => 'San Antonio Masahuat'
            ],
            [
                'department_id' => 6,
                'name' => 'San Emigdio'
            ],
            [
                'department_id' => 6,
                'name' => 'San Francisco Chinameca'
            ],
            [
                'department_id' => 6,
                'name' => 'San Juan Nonualco'
            ],
            [
                'department_id' => 6,
                'name' => 'San Juan Talpa'
            ],
            [
                'department_id' => 6,
                'name' => 'San Juan Tepezontes'
            ],
            [
                'department_id' => 6,
                'name' => 'San Luis Talpa'
            ],
            [
                'department_id' => 6,
                'name' => 'San Luis La Herradura'
            ],
            [
                'department_id' => 6,
                'name' => 'San Miguel Tepezontes'
            ],
            [
                'department_id' => 6,
                'name' => 'San Pedro Masahuat'
            ],
            [
                'department_id' => 6,
                'name' => 'San Pedro Nonualco'
            ],
            [
                'department_id' => 6,
                'name' => 'San Rafael Obrajuelo'
            ],
            [
                'department_id' => 6,
                'name' => 'Santa María Ostuma'
            ],
            [
                'department_id' => 6,
                'name' => 'Santiago Nonualco'
            ],
            [
                'department_id' => 6,
                'name' => 'Tapalhuaca'
            ],
            [
                'department_id' => 6,
                'name' => 'Zacatecoluca'
            ]
        ]);
        //La Union 7
        DB::table($table)->insert([
            [
                'department_id' => 7,
                'name' => 'Anamorós'
            ],
            [
                'department_id' => 7,
                'name' => 'Bolívar'
            ],
            [
                'department_id' => 7,
                'name' => 'Concepción de Oriente'
            ],
            [
                'department_id' => 7,
                'name' => 'Conchagua'
            ],
            [
                'department_id' => 7,
                'name' => 'El Carmen'
            ],
            [
                'department_id' => 7,
                'name' => 'El Sauce'
            ],
            [
                'department_id' => 7,
                'name' => 'Intipucá'
            ],
            [
                'department_id' => 7,
                'name' => 'La Unión'
            ],
            [
                'department_id' => 7,
                'name' => 'Lislique'
            ],
            [
                'department_id' => 7,
                'name' => 'Meanguera del Golfo'
            ],
            [
                'department_id' => 7,
                'name' => 'Nueva Esparta'
            ],
            [
                'department_id' => 7,
                'name' => 'Pasaquina'
            ],
            [
                'department_id' => 7,
                'name' => 'Polorós'
            ],
            [
                'department_id' => 7,
                'name' => 'San Alejo'
            ],
            [
                'department_id' => 7,
                'name' => 'San José'
            ],
            [
                'department_id' => 7,
                'name' => 'Santa Rosa de Lima'
            ],
            [
                'department_id' => 7,
                'name' => 'Yayantique'
            ],
            [
                'department_id' => 7,
                'name' => 'Yucuaiquín'
            ]
        ]);
        //Morazan 8
        DB::table($table)->insert([
            [
                'department_id' => 8,
                'name' => 'Arambala'
            ],
            [
                'department_id' => 8,
                'name' => 'Cacaopera'
            ],
            [
                'department_id' => 8,
                'name' => 'Chilanga'
            ],
            [
                'department_id' => 8,
                'name' => 'Corinto'
            ],
            [
                'department_id' => 8,
                'name' => 'Delicias de Concepción'
            ],
            [
                'department_id' => 8,
                'name' => 'El Divisadero'
            ],
            [
                'department_id' => 8,
                'name' => 'El Rosario'
            ],
            [
                'department_id' => 8,
                'name' => 'Gualococti'
            ],
            [
                'department_id' => 8,
                'name' => 'Guatajiagua'
            ],
            [
                'department_id' => 8,
                'name' => 'Joateca'
            ],
            [
                'department_id' => 8,
                'name' => 'Jocoaitique'
            ],
            [
                'department_id' => 8,
                'name' => 'Jocoro'
            ],
            [
                'department_id' => 8,
                'name' => 'Lolotiquillo'
            ],
            [
                'department_id' => 8,
                'name' => 'Meanguera'
            ],
            [
                'department_id' => 8,
                'name' => 'Osicala'
            ],
            [
                'department_id' => 8,
                'name' => 'Perquín'
            ],
            [
                'department_id' => 8,
                'name' => 'San Carlos'
            ],
            [
                'department_id' => 8,
                'name' => 'San Fernando'
            ],
            [
                'department_id' => 8,
                'name' => 'San Francisco Gotera'
            ],
            [
                'department_id' => 8,
                'name' => 'San Isidro'
            ],
            [
                'department_id' => 8,
                'name' => 'San Simón'
            ],
            [
                'department_id' => 8,
                'name' => 'Sensembra'
            ],
            [
                'department_id' => 8,
                'name' => 'Sociedad'
            ],
            [
                'department_id' => 8,
                'name' => 'Torola'
            ],
            [
                'department_id' => 8,
                'name' => 'Yamabal'
            ],
            [
                'department_id' => 8,
                'name' => 'Yoloaiquín'
            ]
        ]);
        //San Miguel 9
        DB::table($table)->insert([
            [
                'department_id' => 9,
                'name' => 'Carolina'
            ],
            [
                'department_id' => 9,
                'name' => 'Chapeltique'
            ],
            [
                'department_id' => 9,
                'name' => 'Chinameca'
            ],
            [
                'department_id' => 9,
                'name' => 'Chirilagua'
            ],
            [
                'department_id' => 9,
                'name' => 'Ciudad Barrios'
            ],
            [
                'department_id' => 9,
                'name' => 'Comacarán'
            ],
            [
                'department_id' => 9,
                'name' => 'El Tránsito'
            ],
            [
                'department_id' => 9,
                'name' => 'Lolotique'
            ],
            [
                'department_id' => 9,
                'name' => 'Moncagua'
            ],
            [
                'department_id' => 9,
                'name' => 'Nueva Guadalupe'
            ],
            [
                'department_id' => 9,
                'name' => 'Nuevo Edén de San Juan'
            ],
            [
                'department_id' => 9,
                'name' => 'Quelepa'
            ],
            [
                'department_id' => 9,
                'name' => 'San Antonio del Mosco'
            ],
            [
                'department_id' => 9,
                'name' => 'San Gerardo'
            ],
            [
                'department_id' => 9,
                'name' => 'San Jorge'
            ],
            [
                'department_id' => 9,
                'name' => 'San Luis de la Reina'
            ],
            [
                'department_id' => 9,
                'name' => 'San Miguel'
            ],
            [
                'department_id' => 9,
                'name' => 'San Rafael Oriente'
            ],
            [
                'department_id' => 9,
                'name' => 'Sesori'
            ],
            [
                'department_id' => 9,
                'name' => 'Uluazapa'
            ]
        ]);
        //San Salvador 10
        DB::table($table)->insert([
            [
                'department_id' => 10,
                'name' => 'Aguilares'
            ],
            [
                'department_id' => 10,
                'name' => 'Apopa'
            ],
            [
                'department_id' => 10,
                'name' => 'Ayutuxtepeque'
            ],
            [
                'department_id' => 10,
                'name' => 'Cuscatancingo'
            ],
            [
                'department_id' => 10,
                'name' => 'Ciudad Delgado'
            ],
            [
                'department_id' => 10,
                'name' => 'El Paisnal'
            ],
            [
                'department_id' => 10,
                'name' => 'Guazapa'
            ],
            [
                'department_id' => 10,
                'name' => 'Ilopango'
            ],
            [
                'department_id' => 10,
                'name' => 'Mejicanos'
            ],
            [
                'department_id' => 10,
                'name' => 'Nejapa'
            ],
            [
                'department_id' => 10,
                'name' => 'Panchimalco'
            ],
            [
                'department_id' => 10,
                'name' => 'Rosario de Mora'
            ],
            [
                'department_id' => 10,
                'name' => 'San Marcos'
            ],
            [
                'department_id' => 10,
                'name' => 'San Martín'
            ],
            [
                'department_id' => 10,
                'name' => 'San Salvador'
            ],
            [
                'department_id' => 10,
                'name' => 'Santiago Texacuangos'
            ],
            [
                'department_id' => 10,
                'name' => 'Santo Tomás'
            ],
            [
                'department_id' => 10,
                'name' => 'Soyapango'
            ],
            [
                'department_id' => 10,
                'name' => 'Tonacatepeque'
            ]
        ]);
        //San Vicente 11
        DB::table($table)->insert([
            [
                'department_id' => 11,
                'name' => 'Apastepeque'
            ],
            [
                'department_id' => 11,
                'name' => 'Guadalupe'
            ],
            [
                'department_id' => 11,
                'name' => 'San Cayetano Istepeque'
            ],
            [
                'department_id' => 11,
                'name' => 'San Esteban Catarina'
            ],
            [
                'department_id' => 11,
                'name' => 'San Ildefonso'
            ],
            [
                'department_id' => 11,
                'name' => 'San Lorenzo'
            ],
            [
                'department_id' => 11,
                'name' => 'San Sebastián'
            ],
            [
                'department_id' => 11,
                'name' => 'San Vicente'
            ],
            [
                'department_id' => 11,
                'name' => 'Santa Clara'
            ],
            [
                'department_id' => 11,
                'name' => 'Santo Domingo'
            ],
            [
                'department_id' => 11,
                'name' => 'Tecoluca'
            ],
            [
                'department_id' => 11,
                'name' => 'Tepetitán'
            ],
            [
                'department_id' => 11,
                'name' => 'Verapaz'
            ]
        ]);
        // Santa Ana 12
        DB::table($table)->insert([
            [
                'department_id' => 12,
                'name' => 'Candelaria de la Frontera'
            ],
            [
                'department_id' => 12,
                'name' => 'Chalchuapa'
            ],
            [
                'department_id' => 12,
                'name' => 'Coatepeque'
            ],
            [
                'department_id' => 12,
                'name' => 'El Congo'
            ],
            [
                'department_id' => 12,
                'name' => 'El Porvenir'
            ],
            [
                'department_id' => 12,
                'name' => 'Masahuat'
            ],
            [
                'department_id' => 12,
                'name' => 'Metapán'
            ],
            [
                'department_id' => 12,
                'name' => 'San Antonio Pajonal'
            ],
            [
                'department_id' => 12,
                'name' => 'San Sebastián Salitrillo'
            ],
            [
                'department_id' => 12,
                'name' => 'Santa Ana'
            ],
            [
                'department_id' => 12,
                'name' => 'Santa Rosa Guachipilín'
            ],
            [
                'department_id' => 12,
                'name' => 'Santiago de la Frontera'
            ],
            [
                'department_id' => 12,
                'name' => 'Texistepeque'
            ]
        ]);
        //Sonsonate 13
        DB::table($table)->insert([
            [
                'department_id' => 13,
                'name' => 'Acajutla'
            ],
            [
                'department_id' => 13,
                'name' => 'Armenia'
            ],
            [
                'department_id' => 13,
                'name' => 'Caluco'
            ],
            [
                'department_id' => 13,
                'name' => 'Cuisnahuat'
            ],
            [
                'department_id' => 13,
                'name' => 'Izalco'
            ],
            [
                'department_id' => 13,
                'name' => 'Juayúa'
            ],
            [
                'department_id' => 13,
                'name' => 'Nahuizalco'
            ],
            [
                'department_id' => 13,
                'name' => 'Nahulingo'
            ],
            [
                'department_id' => 13,
                'name' => 'Salcoatitán'
            ],
            [
                'department_id' => 13,
                'name' => 'San Antonio del Monte'
            ],
            [
                'department_id' => 13,
                'name' => 'San Julián'
            ],
            [
                'department_id' => 13,
                'name' => 'Santa Catarina Masahuat'
            ],
            [
                'department_id' => 13,
                'name' => 'Santa Isabel Ishuatán'
            ],
            [
                'department_id' => 13,
                'name' => 'Santo Domingo Guzmán'
            ],
            [
                'department_id' => 13,
                'name' => 'Sonsonate'
            ],
            [
                'department_id' => 13,
                'name' => 'Sonzacate'
            ]
        ]);
        //Usulutan 14
        DB::table($table)->insert([
            [
                'department_id' => 14,
                'name' => 'Alegría'
            ],
            [
                'department_id' => 14,
                'name' => 'Berlín'
            ],
            [
                'department_id' => 14,
                'name' => 'California'
            ],
            [
                'department_id' => 14,
                'name' => 'Concepción Batres'
            ],
            [
                'department_id' => 14,
                'name' => 'El Triunfo'
            ],
            [
                'department_id' => 14,
                'name' => 'Ereguayquín'
            ],
            [
                'department_id' => 14,
                'name' => 'Estanzuelas'
            ],
            [
                'department_id' => 14,
                'name' => 'Jiquilisco'
            ],
            [
                'department_id' => 14,
                'name' => 'Jucuapa'
            ],
            [
                'department_id' => 14,
                'name' => 'Jucuarán'
            ],
            [
                'department_id' => 14,
                'name' => 'Mercedes Umaña'
            ],
            [
                'department_id' => 14,
                'name' => 'Nueva Granada'
            ],
            [
                'department_id' => 14,
                'name' => 'Ozatlán'
            ],
            [
                'department_id' => 14,
                'name' => 'Puerto El Triunfo'
            ],
            [
                'department_id' => 14,
                'name' => 'San Agustín'
            ],
            [
                'department_id' => 14,
                'name' => 'San Buenaventura'
            ],
            [
                'department_id' => 14,
                'name' => 'San Dionisio'
            ],
            [
                'department_id' => 14,
                'name' => 'San Francisco Javier'
            ],
            [
                'department_id' => 14,
                'name' => 'Santa Elena'
            ],
            [
                'department_id' => 14,
                'name' => 'Santa María'
            ],
            [
                'department_id' => 14,
                'name' => 'Santiago de María'
            ],
            [
                'department_id' => 14,
                'name' => 'Tecapán'
            ],
            [
                'department_id' => 14,
                'name' => 'Usulután'
            ]
        ]);
    }
}
