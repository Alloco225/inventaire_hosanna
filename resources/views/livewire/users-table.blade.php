<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="card card-custom gutter-b">
            <div class="card-header flex-wrap py-3">
                <div class="card-title">
                    <h3 class="card-label">Liste des utilisateurs
                    </h3>

                </div>

                <div class="card-toolbar">


                    <div class="dropdown dropdown-inline mr-2">
                        <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @include("layouts.icons.ruller") Exporter
                        </button>

                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">

                            <ul class="navi flex-column navi-hover py-2">
                                <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">
                                    Choisissez une option:
                                </li>
                                <li class="navi-item">
                                    <a href="{{ route('exports.site.print') }}" class="navi-link">
                                            <span class="navi-icon">
                                                <i class="la la-print"></i>
                                            </span>
                                        <span class="navi-text">Print</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="{{route('exports.site.excel')}}" class="navi-link">
                                        <span class="navi-icon">
                                            <i class="la la-file-excel-o"></i>
                                        </span>
                                        <span class="navi-text">Excel</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="{{ route('exports.site.excel') }}" class="navi-link">
                                        <span class="navi-icon">
                                            <i class="la la-file-text-o"></i>
                                        </span>
                                        <span class="navi-text">CSV</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="{{route('exports.site.pdf')}}" class="navi-link">
                                        <span class="navi-icon">
                                            <i class="la la-file-pdf-o"></i>
                                        </span>
                                        <span class="navi-text">PDF</span>
                                    </a>
                                </li>
                            </ul>
                            <!--end::Navigation-->
                        </div>
                    </div>

                    <a href="{{ route("utilisateurs.create") }}" class="btn btn-primary font-weight-bolder"><i class="la la-plus"></i> Ajouter un utilisateur</a>

                </div>
            </div>
            <div class="card-body">
                <table class="table  table-checkable" id="kt_datatable">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Nom d'utilisateur</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if($user->is_admin)
                                <span class="label label-inline label-light-success font-weight-bold">Administrateur</span>
                                @else
                                <span class="label label-inline label-light-primary font-weight-bold">Gestionnaire</span>
                                @endif
                            </td>
                            <td class="d-flex">
                                <a href="{{ route("utilisateurs.edit", $user) }}" class="btn btn-icon btn-light btn-sm mr-2">
                                    @include("layouts.icons.pencil")
                                </a>
                                <form action="{{ route("utilisateurs.destroy", $user) }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-icon btn-light btn-sm delete-button">
                                        @include("layouts.icons.trash")
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-3 ">
            {{ $users->links() }}
        </div>

    </div>
</div>
