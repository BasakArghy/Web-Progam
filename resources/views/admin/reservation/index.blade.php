
<x-adminheader/>
        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

              

                <div class="user">
                    <img src="images/customer01.jpg" alt="">
                </div>
            </div>

            <!-- ======================= Cards ================== -->
            

            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Reservations</h2>
                       
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>id</td>
                                <td>shop_id</td>
                                <td>number</td>
                                <td>name</td>
                                <td>date</td>
                                <td>time</td>
                                <td></td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($reservations as $reservation)
                            <tr>
                                <td>{{$reservation->id}}</td>
                                <td>{{$reservation->shop_id}}</td>
                                <td>{{$reservation->number}}</td>
                                <td>{{$reservation->name}}</td>
                                <td>{{$reservation->date}}</td>
                                <td>{{$reservation->time}}</td>
                                <td  >
                    
                                    <div>
                                        <a href="{{route('reservation.edit',$reservation->id)}}" >Edit</a>
                                        <form  method="POST" action="{{route('reservation-destroy',$reservation->id)}}"
                                     onsubmit="return confirm('Are you sure?');">
                                     @method('put')
                                     @csrf
                
                  @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                                    <button type="submit" >Delete</button> 
                                    </form>
                                    </div>
                
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- ================= New Customers ================ -->
                <x-adminfooter />