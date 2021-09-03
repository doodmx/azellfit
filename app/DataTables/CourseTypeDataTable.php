<?php

namespace App\DataTables;

use App\Interfaces\Course\CourseTypeInterface;
use App\Models\Course\CourseType;
use Yajra\DataTables\Services\DataTable;

class CourseTypeDataTable extends DataTable
{
    private $language;

    public function __construct()
    {

        $this->language = app()->getLocale();

    }

    public function dataTable($query)
    {
        return datatables($query)
            ->rawColumns(['image', 'name', 'deleted_at', 'action'])
            ->editColumn('image', function ($data) {

                if ($data->image == null)
                    return '<i class="fas fa-image text-ce-soir fa-2x"></i>';

                return '<img class="img-fluid mx-auto d-block shadow profile-avatar"  src="' . asset('storage/' . $data->image) . '">';
            })
            ->editColumn('name', function ($data) {

                $spanishContent = $data->getTranslation('name', 'es');
                $translation = $data->getTranslation('name', $this->language);

                if ($this->language === 'es')
                    return $spanishContent;


                if ($translation === $spanishContent) {
                    $translation = 'Sin traducción';
                }

                $content = <<<CONTENT
                
                <div>$translation</div>
                <div class="font-weight-bold text-lime-green">
                   <div class="d-inline-block iti-flag mx mr-2"></div> 
                   <div class="d-inline-block">$spanishContent</div>
                </div>
                
CONTENT;

                return $content;

            })
            ->editColumn('deleted_at', function ($data) {


                if (empty($data->deleted_at))
                    return '<span class="badge badge-lime-green text-tangaroa p-2">Activa</span>';

                return '<span class="badge badge-danger p-2">Eliminada</span>';

            })
            ->addColumn('action', 'admin.courses.course_types.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\CourseType $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(CourseTypeInterface $courseTypeContract)
    {

        $courseTypes = $courseTypeContract->paginate($this->request->all());
        return $courseTypes;


    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '250px'])
            ->parameters([
                'language'   => [
                    'url' => '//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json'
                ],
                "lengthMenu" => [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Ver Todos"]],
                "pagingType" => "full_numbers",
                'dom'        => 'Blfrtip',
                'buttons'    => [
                    [
                        'extend'    => 'reload',
                        'className' => 'btn-floating btn-light btn-sm btn-rounded text-dark',
                        'text'      => '<i class="fas fa-sync text-dark"></i>'
                    ]
                ],
                'scrollX'    => false,
                'responsive' => true,
                'order'      => [
                    [3, 'desc']
                ]
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'Miniatura' => ['name' => 'image', 'data' => 'image', "class" => "text-center"],
            'Nombre'    => ['name' => 'name', 'data' => 'name', 'class' => "white-text"],
            'Status'    => ['name' => 'deleted_at', 'data' => 'deleted_at', "class" => "text-center white-text"]
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Categorias_Cursos_' . date('YmdHis');
    }
}
