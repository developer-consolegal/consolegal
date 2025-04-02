@extends('layouts.master')

@section("title","Upload Documents")

@section('content')

<!--  BEGIN NAVBAR  -->
@include("adminheader")
<!--  END NAVBAR  -->

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

    <!--  BEGIN SIDEBAR  -->
    @include("adminsidebar")
    <!--  END SIDEBAR  -->

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="allform-page editorder">
            <h2>Upload Documents</h2>
            <!-- <div class="addbtn pb-4">
                <a class="btn btn-info btn-xs" href="add_form.html">
                    <span class="glyphicon glyphicon-edit"></span> Add New Form<i class="fa fa-plus pl-3" aria-hidden="true"></i></a>
            </div> -->


            <div class="container-fluid mt-5">
                <div>
                    <form action="{{ route('admin.documents.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                
                        <div class="form-group">
                            <input type="hidden" name="user_id" readonly value="{{ $user->id }}" id="user_id" class="form-control" required>
                            <input type="text" name="user" class="form-control text-uppercase" readonly value="{{ $user->name }} ( {{ $user->user_id }} )">
                        </div>
                
                        <div class="form-group">
                            <label for="label">Document Label</label>
                            <input type="text" name="label" id="label" class="form-control" required>
                        </div>
                
                        <div class="form-group">
                            <label for="category">Document Category</label>
                            <select name="category" id="category" class="form-control" required>
                                <option value="incorporation">Incorporation</option>
                                <option value="registration">Registration</option>
                                <option value="income tax">Income Tax</option>
                                <option value="gst">GST</option>
                                <option value="compliance">Compliance</option>
                                <option value="others">Others</option>
                                <option value="loans">Loans</option>
                                <option value="insurance">Insurance</option>
                                <option value="kyc">Kyc</option>
                                <option value="order">Order</option>
                                <option value="invoice">Invoice</option>
                                <option value="acknowledgment">Acknowledgment</option>
                                <option value="startup">Startup</option>
                                <option value="msme">MSME</option>
                        </select>
                        </div>
                
                        <div class="form-group">
                            <label for="file">Upload File</label>
                            <input type="file" name="file" id="file" class="form-control" required>
                        </div>
                
                        <button type="submit" class="btn btn-warning text-white">Upload</button>
                    </form>
                </div>

                <div class="upldtable">
                    <h4 class="pt-3">Customer Documents Upload</h4>
                    <table class="table table-striped custab">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Label</th>
                                <th>Category</th>
                                <th>File</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($documents as $document)
                            <tr>
                                <td>{{ $document->user->name }}</td>
                                <td>{{ $document->label }}</td>
                                <td>{{ $document->category }}</td>
                                <td><a href="{{ route('documents.download', $document->id) }}" class="btn btn-warning text-white">Download</a></td>
                                <td>
                                    <form action="{{ route('admin.documents.destroy', $document->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
            </div>
        </div>
    </div>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js" integrity="sha512-LGXaggshOkD/at6PFNcp2V2unf9LzFq6LE+sChH7ceMTDP0g2kn6Vxwgg7wkPP7AAtX+lmPqPdxB47A0Nz0cMQ==" crossorigin="anonymous"></script>

@endsection