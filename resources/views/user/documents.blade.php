@extends('layouts.user')

@section("title","Dashboard User")


@section('content')
<!-- ORDERS DETAILS START -->
<div class="tab-pane text-style active" id="tab2">
  <h4 class="text-muted">Documents</h4>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="menu1" class="container tab-pane active">

      <form method="get" class="row border py-2 w-100 mx-auto">
        <div class="form-group col-5 m-0">
          <input type="text" name="label" class="form-control" placeholder="Search By Label">
        </div>
        <div class="form-group col-5 m-0">
          <select name="category" id="category" class="form-control">
            <option value="">Select Category</option>
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

        <div class="col-2 text-center">
          <input type="submit" class="btn btn-warning text-white" value="Filter" />
        </div>
      </form>

      <table class="table table-striped custab mt-4">
        <thead>
          <tr>
            <th>Label</th>
            <th>Category</th>
            <th>Date & Time</th>
            <th class="text-center">Download</th>
          </tr>
        </thead>
        @foreach ($documents as $document)
        <tr>
          <td>{{ $document->label }}</td>
          <td>{{ $document->category }}</td>
          <td>{{ $document->created_at }}</td>
          <td class="text-center"><a href="{{ route('documents.download', $document->id) }}" class="btn btn-warning text-white"><i class="fas fa-download"></i></a></td>
        </tr>
        @endforeach

      </table>

{{$documents->links()}}
    </div>

  </div>
</div>

@endsection