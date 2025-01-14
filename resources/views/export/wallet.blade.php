<table>
   <thead>
      <tr>
         <th>User ID</th>
         <th>User Name</th>
         <th>Total Coin</th>
      </tr>
   </thead>

  @foreach ( $data as $item)
                    @if($item->user !== null)
                    <tr>
                        <td>{{$item->user->user_id}}</td>
                        <!-- <td>dd/mm/yyyy</td> -->
                        <td><a href="/admin/wallet/user?id={{$item->user_id}}">
                                
                                {{$item->user!==null?$item->user->name:''}}
                            </a></td>
                        <td>{{$item->amount}}</td>
                    </tr>
                    @else

                    @if($item->fran !== null)
                    <tr>
                        <td>{{$item->fran->user_id}}</td>
                        <!-- <td>dd/mm/yyyy</td> -->
                        <td><a href="/admin/wallet/fran?id={{$item->fran->id}}">
                                
                                {{$item->fran!==null?$item->fran->name:''}}
                            </a></td>
                        <td>{{$item->amount}}</td>
                    </tr>
                    @endif

                    @endif
                    @endforeach
</table>