@extends('layouts.base')

@section('contents')
<div class="bg-dark text-light py-2 mb-3">
    <h1 class="ms-4" style="font-weight: 700">Cestino</h1>
</div>

@if (session('delete_success'))
    @php $project = session('delete_success') @endphp
    <div class="alert alert-danger">
        Il progetto "{{ $project->title }}" è stato eliminato definitivamente
    </div>
@endif

<div class="container">

    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Creation Date</th>
                <th scope="col">Last Update</th>
                <th scope="col">Collaborators</th>
                <th scope="col">Description</th>
                <th scope="col">Languages</th>
                <th scope="col">Link</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trashedProjects as $project)
                <tr>
                    <th scope="row">{{ $project->title }}</th>
                    <td>{{ $project->author }}</td>
                    <td>{{ $project->creation_date}}</td>
                    <td>{{ $project->last_update }}</td>
                    <td>{{ $project->collaborators }}</td>
                    <td>{{ $project->description }}</td>
                    <td>{{ $project->languages }}</td>
                    <td><a href="{{ $project->link_github }}">Link</a></td>

                    <td>
                        <form
                            action=
                            "{{ route('admin.projects.restore', ['project' => $project->id]) }}"
                            method="post"
                            class="d-inline-block"
                        >
                            @csrf
                            <button class="btn btn-success">Ripristina</button>
                        </form>
                        <form
                            action="{{ route('admin.projects.harddelete', ['project' => $project->id]) }}"
                            method="post"
                            class="d-inline-block"
                        >
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger button_delete">
                                Elimina definitivamente
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>



{{ $trashedComics->links() }}