<?php

use Illuminate\Database\Seeder;

class FiltersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //1 Unidad
      //2 subunidad
      //3 tipo
      //4 sector


    //////////
      DB::table('filters')->insert([
          //unidad
          ['filter_type_id' => 1, 'slug' => 'cidem', 'name' => 'Centro de Innovación y Desarrollo de Empresas y Organizaciones (CIDEM)', 'parent' => null],
          ['filter_type_id' => 1, 'slug' => 'cinea', 'name' => 'Centro de Investigaciones en Estadística Aplicada (CINEA)', 'parent' => null],
          ['filter_type_id' => 1, 'slug' => 'ingenieria-ambiental', 'name' => 'Ingeniería Ambiental', 'parent' => null],
          ['filter_type_id' => 1, 'slug' => 'idecrea', 'name' => 'Centro de Etnomusicología y Creación en Artes Tradicionales y de Vanguardia “Dra. Isabel Aretz” (IDECREA)', 'parent' => null],
          ['filter_type_id' => 1, 'slug' => 'icytec', 'name' => 'Instituto de Ciencia y Tecnología (ICyTec)', 'parent' => null],
          ['filter_type_id' => 1, 'slug' => 'iiac', 'name' => 'Instituto de Investigación en Arte y Cultura “Dr. Norberto Griffa”', 'parent' => null],
          ['filter_type_id' => 1, 'slug' => 'sig', 'name' => 'Licenciatura en Sistemas de Información Geográfica', 'parent' => null],
          ['filter_type_id' => 1, 'slug' => 'ingenieria-sonido', 'name' => 'Ingeniería de Sonido ', 'parent' => null],

          //Subunidad
          [ 'filter_type_id' => 2, 'slug' => 'coordinacion-proyectos-institucionales', 'name' => 'Coordinación de Proyectos Institucionales', 'parent' => 1],
          [ 'filter_type_id' => 2, 'slug' => 'ceer', 'name' => 'Centro de Estudios de EnergÍas Renovables (CEER)', 'parent' => 4],
          [ 'filter_type_id' => 2, 'slug' => 'materia', 'name' => ' Centro de Investigación en Arte, Materia y Cultura (MATERIA)', 'parent' => 6],
          //tipo
          ['filter_type_id' => 3, 'slug' => 'analisis', 'name' => 'Análisis', 'parent' => null],
          ['filter_type_id' => 3, 'slug' => 'asistencia-tecnica', 'name' => 'Asistencia técnica', 'parent' => null],
          ['filter_type_id' => 3, 'slug' => 'calibracion', 'name' => 'Calibración', 'parent' => null],
          ['filter_type_id' => 3, 'slug' => 'calificacion', 'name' => 'Calificación', 'parent' => null],
          ['filter_type_id' => 3, 'slug' => 'certificacion-homologacion-regimenes-especiales', 'name' => 'Certificación/Homologación/Regímenes Especiales', 'parent' => null],
          ['filter_type_id' => 3, 'slug' => 'control-ambiental-medio-ambiental', 'name' => 'Control ambiental/Medio ambiental', 'parent' => null],
          ['filter_type_id' => 3, 'slug' => 'control-calidad', 'name' => 'Control de calidad', 'parent' => null],
          ['filter_type_id' => 3, 'slug' => 'desarrollo-procesos', 'name' => 'Desarrollo de procesos', 'parent' => null],
          ['filter_type_id' => 3, 'slug' => 'desarrollo-productos', 'name' => 'Desarrollo de productos', 'parent' => null],
          ['filter_type_id' => 3, 'slug' => 'diseno-producto', 'name' => 'Diseño de producto', 'parent' => null],
          ['filter_type_id' => 3, 'slug' => 'ensayo', 'name' => 'Ensayo', 'parent' => null],
          ['filter_type_id' => 3, 'slug' => 'formacion-rrhh', 'name' => 'Formación de RRHH', 'parent' => null],
          ['filter_type_id' => 3, 'slug' => 'peritaje', 'name' => 'Peritraje', 'parent' => null],
          ['filter_type_id' => 3, 'slug' => 'desarrollo-software', 'name' => 'Programación y desarrollo software', 'parent' => null],
          ['filter_type_id' => 3, 'slug' => 'tecnologia-gestion', 'name' => 'Tecnología de Gestion', 'parent' => null],
          ['filter_type_id' => 3, 'slug' => 'otra', 'name' => 'Otra', 'parent' => null],
          //sector
          ['filter_type_id' => 4, 'slug' => 'sector-privado', 'name' => 'Sector Privado en general', 'parent' => null],
          ['filter_type_id' => 4, 'slug' => 'sociedad-civil-economia-social-asociativismo', 'name' => 'Sociedad Civil/Economía Social/Asociativismo', 'parent' => null],
          ['filter_type_id' => 4, 'slug' => 'comunidad', 'name' => 'Comunidad', 'parent' => null],
          ['filter_type_id' => 4, 'slug' => 'organismos-publicos', 'name' => 'Organismos públicos', 'parent' => null],
          ['filter_type_id' => 4, 'slug' => 'ong', 'name' => 'Organismos No Gubernamentales', 'parent' => null],
          ['filter_type_id' => 4, 'slug' => 'diseno', 'name' => 'Diseño', 'parent' => null],
          ['filter_type_id' => 4, 'slug' => 'tics', 'name' => 'Tic´s', 'parent' => null],
          ['filter_type_id' => 4, 'slug' => 'sistema-cyt', 'name' => 'Sistema científico y tecnológico', 'parent' => null],
          ['filter_type_id' => 4, 'slug' => 'cuero', 'name' => 'Cuero', 'parent' => null],
          ['filter_type_id' => 4, 'slug' => 'transporte', 'name' => 'Transporte', 'parent' => null],
          ['filter_type_id' => 4, 'slug' => 'energia', 'name' => 'Energia', 'parent' => null],
          ['filter_type_id' => 4, 'slug' => 'alimentos-bebidas', 'name' => 'Alimentos y bebidas', 'parent' => null],
          ['filter_type_id' => 4, 'slug' => 'papel', 'name' => 'Papel', 'parent' => null],
          ['filter_type_id' => 4, 'slug' => 'quimica-petroquimica', 'name' => 'Química y petroquímica', 'parent' => null],
          ['filter_type_id' => 4, 'slug' => 'metalmecanica', 'name' => 'Metalmecánica', 'parent' => null],
          ['filter_type_id' => 4, 'slug' => 'automotriz', 'name' => 'Automotriz', 'parent' => null],
          ['filter_type_id' => 4, 'slug' => 'textil', 'name' => 'Textil', 'parent' => null],
          ['filter_type_id' => 4, 'slug' => 'mineria', 'name' => 'Minería', 'parent' => null],
          ['filter_type_id' => 4, 'slug' => 'nanotecnologia', 'name' => 'Nanotecnologia', 'parent' => null],
          ['filter_type_id' => 4, 'slug' => 'agricultura', 'name' => 'Agricultura', 'parent' => null],
          ['filter_type_id' => 4, 'slug' => 'ganaderia', 'name' => 'Ganaderia', 'parent' => null],
          ['filter_type_id' => 4, 'slug' => 'madera', 'name' => 'Madera', 'parent' => null],
          ['filter_type_id' => 4, 'slug' => 'construccion', 'name' => 'Construcción (incl. Materiales)', 'parent' => null],
          ['filter_type_id' => 4, 'slug' => 'biotecnologia', 'name' => 'Biotecnología', 'parent' => null],
      ]);
    }
}
