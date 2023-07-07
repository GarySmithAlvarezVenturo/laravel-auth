@extends('Admin.layouts.base')

@section('contents')

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Creation Date</th>
                <th scope="col">Last Update</th>
                <th scope="col">Collaborators</th>
                <th scope="col">Description</th>
                <th scope="col">Languages</th>
                <th scope="col">Link Github</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <th scope="row">{{ $project->title }}</th>
                    <td>{{ $project->author }}</td>
                    <td>{{ $project->creation_date }}</td>
                    <td>{{ $project->last_update }}</td>
                    <td>{{ $project->collaborators }}</td>
                    <td>{{ $project->description }}</td>
                    <td>{{ $project->languages }}</td>
                    <td>{{ $project->link_github }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('admin.project.show', ['project' => $project->id]) }}">View</a>
                        <a class="btn btn-warning" href="{{ route('admin.project.edit', ['project' => $project->id]) }}">Edit</a>
                        <form
                            action="{{ route('admin.project.destroy', ['project' => $project->id]) }}"
                            method="post"
                            class="d-inline-block"
                        >
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

{{-- {{ $projects->links() }} --}}
@endsection