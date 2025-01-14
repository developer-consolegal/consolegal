<table>
   <thead>
      <tr>
         <th>Order ID</th>
         <th>User ID</th>
         <th>From</th>
         <th>Service ID</th>
         <th>Service Name</th>
         <th>Status</th>
         <th>Amount</th>
         <th>Payment Mode</th>
         <th>Payment ID</th>
         <th>Order Created At</th>
         <th>Order Updated At</th>
      </tr>
   </thead>

   @foreach ($data as $list)
   <tr>
      <td>{{$list->id}}</td>
      <td>{{$list->user_id?'UM-CL-00'.$list->user_id:'null'}}</td>
      <td>
         <!-- @if($list->user_id !== 'null')
         Web
         @endif
         @if($list->fran_id !== 'null')
         {{'FM-CL-00'.$list->fran_id}}
         @endif

         @if(!$list->user_id && !$list->fran_id)
         Admin
         @endif -->


         @if($list->lead?->from == 'web')
         Web
         @endif
         @if($list->lead?->from !== 'agents' && $list->lead?->from !== 'web' && $list->lead?->from !== 'admin')
         {{$list->lead?->fran?->user_id ? $list->lead->fran?->user_id : 'FM-CL-0'.$list->lead?->fran_id}}
         @endif

         @if($list->lead?->from == 'agents' && $list->lead?->from !== 'web' && $list->lead?->from !== 'admin')
         {{$list->agent?->user_id ? $list->agent?->user_id : 'AM-CL-0'.$list->lead?->agent_id}}
         @endif

         @if($list->lead?->from == 'admin')
         Admin
         @endif

      </td>
      <td>{{$list->service_id}}</td>
      <td>{{$list->service->name}}</td>
      <td>{{$list->form_status ? $list->form_status : 'Done'}}</td>
      <td>{{$list->payment?$list->payment->amount : $list->service->price}}</td>
      <td>{{$list->payment_mode}}</td>
      <td>{{$list->payment_id}}</td>
      <td>{{$list->created_at}}</td>
      <td>{{$list->updated_at}}</td>
   </tr>
   @endforeach
</table>