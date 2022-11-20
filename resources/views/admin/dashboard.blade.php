@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
    <div class="db-container">
        <h1>Collection of Records</h1>
        <h5>Here's the list of records</h5>
        <div class="tb-wrapper">
            <div class="row_head">
                <span class="row_toggle is-active">Categories</span>
                <span class="row_toggle">Posts</span>
                <span class="row_toggle">Users</span>
            </div>
            <div class="tb-container">
                <div class="row">
                    <div class="row_body">
                        <span class="row_content is-active">
                            <div class="table-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Category Name</th>
                                            <th>Post Name</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->category->name }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->status == '1' ? 'Hidden' : 'Shown' }}</td>
                                                <td>{{ $item->created_at }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </span>
                        <span class="row_content">
                            <div class="table-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Category Name</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Created at</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($category as $item)
                                            <tr>
                                                <td> {{ $item->id }} </td>
                                                <td> {{ $item->name }} </td>
                                                <td>
                                                    <img src=" {{ asset('uploads/category/' . $item->image) }}"
                                                        width="50px" height="50px" alt="">
                                                </td>
                                                <td> {{ $item->status == '1' ? 'Hidden' : 'Shown' }} </td>
                                                <td> {{ $item->created_at }} </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </span>
                        <span class="row_content">
                            <div class="table-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Created At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->role_as == '1' ? 'Admin' : 'User' }}</td>
                                                <td> {{ $item->created_at }} </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
