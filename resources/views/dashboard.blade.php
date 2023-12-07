@extends('welcome')
    @section('view')
    <div class="mx-10 mt-8">
        <div class="mx-auto" style="">
            @if(session('success'))
                <div class="text-sm text-green-500">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="text-sm text-red-500">
                    {{ session('error') }}
                </div>
            @endif
            <table class="w-full mx-6 mt-12" id="usersTable">
                <thead>
                    <tr>
                    <th>
                        Name
                    </th>
                    <th>
                        Email
                    </th>
                    @if(auth()->user()->role_id == 2)
                        <th>
                            Action
                        </th>
                    @endif
                </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        @if(auth()->user()->role_id == 2)
                            <td>
                                <a href="{{route('user.delete',$user->id)}}" class="select-none rounded-lg border border-gray-900 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                    type="button"
                                  >Delete</a>
                            </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
    
        </div>
    </div>
    <script>
        $(document).ready( function () {
            $('#usersTable').DataTable({
                "autoWidth": true,
                "lengthMenu": [10, 25, 50, 100],
                "pageLength": 10,
            });
        } );
    </script>
@endsection

