<?php

namespace App\DataTables;

use DB;
use App\Interfaces\User\UserInterface;
use Yajra\DataTables\Services\DataTable;

class UserDatatable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->rawColumns(['photo', 'contact', 'action', 'profile'])
            ->editColumn('photo', function ($user) {

                $src = asset('img/user.png');

                if (!empty($user->profile->photo)) {
                    $src = asset($user->profile->photo);
                }

                return '<img src="' . $src . '" alt="Avatar" class="profile-avatar">';

            })
            ->editColumn('partner_id', function ($user) {

                if ($user->roles[0]['name'] !== 'Investment') {
                    return '-';
                }
                if (!empty($user->owner)) {
                    return $user->owner->lastname . ' ' . $user->owner->name;
                }

                return 'Azell';
            })
            ->editColumn('lastname', function ($user) {

                return $user->profile->lastname . ' ' . $user->profile->name;
            })
            ->editColumn('partner_id', function ($user) {

                if ($user->roles[0]['name'] !== 'Investment') {
                    return '-';
                }
                if (!empty($user->owner)) {
                    return $user->owner->lastname . ' ' . $user->owner->name;
                }

            })
            ->editColumn('contact', function ($user) {
                $emailButton = <<<HTML
                <p class="p-0 m-0">
                    <a class="white-text" href="mailto:{$user->email}" target="_blank">
                        <i class="far fa-envelope h5-responsive mr-1 text-lime-green"></i>{$user->email}
                    </a>
                </p>
HTML;

                $whatsAppButton = <<<HTML
                <p class="p-0 mt-1">
                    <a class="white-text" href="https://api.whatsapp.com/send?phone={$user->profile->phone_number}&text=¡Hola buen día!" target="_blank">
                        <i class="fab fa-whatsapp h5-responsive text-lime-green mr-1"> </i>{$user->profile->phone_number}
                    </a>
                </p>
HTML;

                return $whatsAppButton . $emailButton;
            })
            ->addColumn('action', 'admin.users.datatables_actions');
    }


    /**
     * Get query source of dataTable.
     *
     * @param UserInterface $user
     * @return mixed
     */
    public function query(UserInterface $user)
    {
        $users = $user->paginate($this->request->all());
        return $users;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {

        $i18n = [
            'es' => '//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json',
            'en' => '//cdn.datatables.net/plug-ins/1.10.21/i18n/English.json'
        ];
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '20px', 'className' => 'text-right'])
            ->parameters([
                'language'   => [
                    'url' => $i18n[app()->getLocale()]
                ],
                'lengthMenu' => [[10, 25, 50, 100, -1], [10, 25, 50, 100, __('my_investors.view_all')]],
                'pagingType' => 'full_numbers',
                'dom'        => 'Blfrtip',
                'scrollX'    => false,
                'order'      => [
                    [1, 'asc']
                ],
                'buttons'    => [
                    [
                        'extend'    => 'reload',
                        'className' => 'btn-floating btn-light btn-sm btn-rounded text-dark',
                        'text'      => '<i class="fas fa-sync text-dark"></i>'
                    ],
                    [
                        'extend'    => 'copy',
                        'text'      => '<i class="fas fa-clipboard text-dark"></i>',
                        'className' => 'btn-floating btn-light btn-sm btn-rounded text-dark'
                    ],
                    [
                        'extend'    => 'excel',
                        'text'      => '<i class="fas fa-file-excel text-dark"></i>',
                        'className' => 'btn-floating btn-light btn-sm btn-rounded text-dark'
                    ],
                ],
                'scrollX'    => false,
                'responsive' => true
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
            'photo'           => [
                'name'       => 'profile.photo',
                'data'       => 'photo',
                'title'      => 'Imagen',
                'className'  => 'white-text',
                'orderable'  => false,
                'exportable' => false,
                'visible'    => request()->route()->getName() === 'users.index'
            ],
            'id_card'         => [
                'name'       => 'profile.id_card',
                'data'       => 'id_card',
                'visible'    => false,
                'exportable' => false
            ],
            'proof_residence' => [
                'name'       => 'profile.proof_residence',
                'data'       => 'proof_residence',
                'visible'    => false,
                'exportable' => false
            ],
            'lastname'        => [
                'name'      => 'profile.lastname',
                'data'      => 'lastname',
                'title'     => __('my_investors.name'),
                'className' => 'white-text align-middle'
            ],
            'name'            => [
                'name'       => 'profile.name',
                'data'       => 'name',
                'title'      => __('my_investors.name'),
                'className'  => 'white-text',
                'visible'    => false,
                'exportable' => false
            ],
            'role'            => [
                'name'       => 'roles',
                'data'       => 'roles.0.name',
                'title'      => 'Rol',
                'className'  => 'white-text text-left align-middle',
                'orderable'  => false,
                'searchable' => false,
                'visible'    => request()->route()->getName() === 'users.index'
            ],
            'contact'         => [
                'name'       => 'profile.phone_number',
                'data'       => 'contact',
                'title'      => __('my_investors.contact'),
                'className'  => 'white-text text-left',
                'orderable'  => false,
                'exportable' => false
            ],

            'phone_number' => [
                'name'    => 'profile.phone_number',
                'data'    => 'profile.phone_number',
                'title'   => 'Teléfono',
                'visible' => false,
            ],

            'email'   => [
                'name'    => 'email',
                'data'    => 'email',
                'title'   => 'Correo Electrónico',
                'visible' => false,
            ],
            'partner' => [
                'name'       => 'partner_id',
                'data'       => 'partner_id',
                'title'      => 'Partner',
                'className'  => 'white-text align-middle',
                'orderable'  => false,
                'searchable' => false,
                'width'      => '200px',
                'visible'    => request()->route()->getName() === 'users.index'
            ],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'User_' . date('YmdHis');
    }
}
