
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
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    <div class="cardHeader">
                       
                        <h2>Shop Owner</h2>
                       
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>id</td>
                                <td>number</td>
                                <td>name</td>
                                <td>lat</td>
                                <td>lng</td>
                                <td>price</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $user)
                            <?php if($user->type=="owner"){?>
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->number}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->lat}}</td>
                                <td>{{$user->lng}}</td>
                                <td>{{$user->price}}</td>
                                <td  >
                    
                                        <a href="{{route('reservation.edit',$user->id)}}" style="color: black">Edit</a> </td>
                                        <td>
                                        <form  method="POST" action="{{route('reservation-destroy',$user->id)}}"
                                     onsubmit="return confirm('Are you sure?');">
                                     @method('put')
                                     @csrf
                
                
                                    <button type="submit" >Delete</button> 
                                    </form>
                                    </div>
                
                                </td>
                            </tr>
<?php }?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="details">
                <div class="recentOrders">
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    <div class="cardHeader">
                       
                        <h2>Customer</h2>
                       
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>id</td>
                                <td>number</td>
                                <td>name</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $user)
                            <?php if($user->type=="customer"){?>
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->number}}</td>
                                <td>{{$user->name}}</td>
                                <td  >
                    
                                        <a href="{{route('reservation.edit',$user->id)}}" style="color: black">Edit</a> </td>
                                        <td>
                                        <form  method="POST" action="{{route('reservation-destroy',$user->id)}}"
                                     onsubmit="return confirm('Are you sure?');">
                                     @method('put')
                                     @csrf
                
                
                                    <button type="submit" >Delete</button> 
                                    </form>
                                    </div>
                
                                </td>
                            </tr>
<?php }?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- ================= New Customers ================ -->
                <x-adminfooter />