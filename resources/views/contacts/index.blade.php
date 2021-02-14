@extends('contacts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">

            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('contacts.create') }}"> Create New Contact</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <th>fio</th>
            <th>phone</th>
            <th>favorites</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->fio }}</td>
                <td>{{ $contact->phone }}</td>
                <td>{{ $contact->favorites }}</td>
                <td>
                    <form action="{{ route('contacts.destroy',$contact->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('contacts.show',$contact->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('contacts.edit',$contact->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $contacts->links() !!}

@endsection
