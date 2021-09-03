<?php

namespace App\DataTables;

use App\Interfaces\User\RoleInterface;
use Yajra\DataTables\Services\DataTable;

class RoleDataTable extends DataTable
{


    public function dataTable($query)
    {
        return datatables($query)
            ->rawColumns(['deleted_at', 'action'])
            ->editColumn('deleted_at', function ($data) {


                if (empty($data->deleted_at))
                    return '<span class="badge badge-lime-green text-tangaroa p-2">Activo</span>';

                return '<span class="badge badge-danger p-2">Eliminado</span>';

            })
            ->addColumn('action', 'admin.roles.datatables_actions');
    }


    public function query(RoleInterface $roleContract)
    {
        return $roleContract->paginate($this->request->all());
    }


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
                "lengthMenu" => [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Ver Todas"]],
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
            'Role'   => ['name' => 'name', 'data' => 'name', 'class' => 'white-text'],
            'Status' => ['name' => 'deleted_at', 'data' => 'deleted_at'],
        ];

    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Roles_' . date('YmdHis');
    }
}
