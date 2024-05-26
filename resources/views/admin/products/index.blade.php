
<x-adminheader/>
        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

              

                <div class="user">
                    <img src="images/user.png" alt="">
                </div>
            </div>

            <!-- ======================= Cards ================== -->
            

            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <a href="products/create" style="color: black">Add Products</a>
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    <div class="cardHeader">
                       
                        <h2>Products</h2>
                       
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>id</td>
                                <td>name</td>
                                <td>description</td>
                                <td>image</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->description}}</td>
                                <td><img src="{{$product->image}}" width="100" height="100">
                                </td>
                               
                                <td  >
                    
                                        <a href="{{route('products.edit',$product->id)}}" style="color: black">Edit</a> </td>
                                        <td>
                                        <form  method="POST" action="{{route('products-destroy',$product->id)}}"
                                     onsubmit="return confirm('Are you sure?');">
                                     @method('put')
                                     @csrf
                
                
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