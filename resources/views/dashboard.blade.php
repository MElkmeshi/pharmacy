

@extends('aside_bar')
@section('name')
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
@endsection
@section('card')
    <!-- ======================= Cards ================== -->
    <div class="cardBox">
        <div class="card">
            <div>
                <div class="numbers">1,504</div>
                <div class="cardName">Daily Views</div>
            </div>

            <div class="iconBx">
                <ion-icon name="eye-outline"></ion-icon>
            </div>
        </div>

        <div class="card">
            <div>
                <div class="numbers">80</div>
                <div class="cardName">Sales</div>
            </div>

            <div class="iconBx">
                <ion-icon name="cart-outline"></ion-icon>
            </div>
        </div>

        <div class="card">
            <div>
                <div class="numbers">284</div>
                <div class="cardName">Comments</div>
            </div>

            <div class="iconBx">
                <ion-icon name="chatbubbles-outline"></ion-icon>
            </div>
        </div>

        <div class="card">
            <div>
                <div class="numbers">$7,842</div>
                <div class="cardName">Earning</div>
            </div>

            <div class="iconBx">
                <ion-icon name="cash-outline"></ion-icon>
            </div>
        </div>
    </div>
    
            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Orders</h2>
                        <a href="{{ route('orders_admin') }}" class="btn">View All</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Price</td>
                                <td>Adress</td>
                                <td>Status</td>
                            </tr>
                        </thead>
                            
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{$order->name}}</td>
                                <td>${{ $order->total_amount }}</td>
                                <td>{{ $order->address }}</td>
                                <td ><span class="status {{$order->status}}">{{ $order->status }}</span></td>
                                
                            </tr>
                        @endforeach 
                        </tbody>
                    </table>
                </div>

                
                <!-- ================= New Customers ================ -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Recent Customers</h2>
                    </div>

                    <table>
                        <thead>
                            <tr>
                            <td>
                                Name
                            </td>
                            <td>
                                Address
                            </td></tr>
                            
                        </thead>
                        <tbody>


                            @foreach ($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{ $user->address }}</td>
                                
                            </tr>
                        @endforeach 
                            
                        </tbody>
                        


                        
                    </table>
                </div>

@endsection