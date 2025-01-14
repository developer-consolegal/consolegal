<table>
   <thead>
      <tr>
         <th>Lead ID</th>
         <th>Name</th>
         <th class="nowrap">Email</th>
         <th>Query</th>
         <th>Phone No</th>
         <th>From</th>
         <th>Status</th>
         <th class="nowrap">Service</th>
         <th class="text-nowrap">Enquiry Date</th>
      </tr>
   </thead>

   @foreach ($data as $list)
   <tr>
      <td>{{$list->id}}</td>
      <td>{{$list->name}}</td>
      <td>{{$list->email}}</td>
      <td>{{$list->message}}</td>
      <td>{{$list->phone}}</td>
      <td class="text-nowrap">
         @if($list->from == 'web')
         Web
         @endif
         @if($list->from !== 'agents' && $list->from !== 'web' && $list->from !== 'admin')
         {{$list->fran?->user_id ? $list->fran?->user_id : 'FM-CL-0'.$list->fran_id}}
         @endif

         @if($list->from == 'agents' && $list->from !== 'web' && $list->from !== 'admin')
         {{$list->agent?->user_id ? $list->agent?->user_id : 'AM-CL-0'.$list->agent_id}}
         @endif

         @if($list->from == 'admin')
         Admin
         @endif
      <td>
      {{$list->status}}
      </td>
      <td>
         {{$list->service->name}}
      </td>
      <td>{{$list->created_at}}</td>
   </tr>
   @endforeach
</table>