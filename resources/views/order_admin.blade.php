@extends('aside_bar')

@section($active="displayOrders")
@section('name')
    <link rel="stylesheet" href="/css/disproduct.css">
    <style>
        .details table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 10px;
}
.details table thead td {
  font-weight: 600;
}
.details .recentOrders table tr {
  color: var(--black1);
  border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}
.details .recentOrders table tr:last-child {
  border-bottom: none;
}
.details .recentOrders table tbody tr:hover {
  background: var(--blue);
  color: var(--white);
}
.details .recentOrders table tr td {
  padding: 10px;
}
.details .recentOrders table tr td:last-child {
  text-align: end;
}
.details .recentOrders table tr td:nth-child(2) {
  text-align: end;
}
.details .recentOrders table tr td:nth-child(3) {
  text-align: center;
}
.status.Delivered,
.status.delivered {
  padding: 2px 4px;
  background: #aaea61;
  color: var(--white);
  border-radius: 4px;
  font-size: 14px;
  font-weight: 500;
}
.status.Delivered:hover{
  background: #4c7819;
}


.status.Cancelled,
.status.cancelled {
  padding: 2px 4px;
  background: rgb(240, 92, 92);
  color: var(--white);
  border-radius: 4px;
  font-size: 14px;
  font-weight: 500;
}
.status.Cancelled:hover{
  background: rgb(104, 5, 5);
}
.status.Processing,
.status.processing {
  padding: 2px 4px;
  background: #49b7ea;
  color: var(--white);
  border-radius: 4px;
  font-size: 14px;
  font-weight: 500;
}
.status.Processing:hover{
  background: #0d5271;
}
label .order {
    margin-right: 15px;
}

select {
    padding: 6px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    padding: 6px 10px;
    background-color: #19283f;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #133a75;
}

/* 
this is style for pagination 
*/
.pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px; /* Adjust the margin as needed */
    }

    .pagination .page-item {
        margin: 0 5px;
        list-style: none;
    }

    .pagination .page-link {
        padding: 8px 16px;
        text-decoration: none;
        color: #333;
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
        border-radius: 4px;
        transition: background-color 0.3s;
    }

    .pagination .page-link:hover {
        background-color: #e9ecef;
    }

    .pagination .active .page-link {
        background-color: #133a75;
        color: #fff;
        border-color: #133a75;
    }
    </style>
    <title> Orders</title>
@endsection
@section('card')
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2> Orders</h2>     
            </div>
            <form action="{{ route('orders_admin') }}" method="GET">
              <label class="order" for="status">Filter by Status:</label>
              <select name="status" id="status">
                  <option value="all" {{ $statusFilter === 'all' ? 'selected' : '' }}>All</option>
                  <option value="Cancelled" {{ $statusFilter === 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                  <option value="Delivered" {{ $statusFilter === 'Delivered' ? 'selected' : '' }}>Delivered</option>
                  <option value="Processing" {{ $statusFilter === 'Processing' ? 'selected' : '' }}>Processing</option>
              </select>
              <button type="submit">Filter</button>
          </form>
           
          <table>
            <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Address</th>
                    <th>Actions</th>
                    <th>Order Items</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->name }}</td>
                        <td>${{ $order->total_amount }}</td>
                        <td ><span class="status {{$order->status}}">{{ $order->status }}</span></td>
                        <td>{{ $order->address }}</td>
                        <td>
                           
                            
                            <a href="{{ route('order.action', ['order_id' => $order->id,'button_name' => 'delivered']) }}"><button class="status Delivered">Delivered</button></a>
                            <a href="{{ route('order.action', ['order_id' => $order->id,'button_name' => 'processing']) }}"><button class="status Processing">Processing</button></a>
                            <a href="{{ route('order.action', ['order_id' => $order->id,'button_name' => 'cancelled']) }}"><button class="status Cancelled">Cancelled</button></a>
                        </td>
                        <td >
                          <ul>
                              @foreach ($order->orderItems as $orderItem)
                                 
                                      Product Name: {{ $orderItem->product->name }}
                                      <br>
                                      Quantity: {{ $orderItem->quantity }}
                                      <br><br>

                              @endforeach
                          </ul>
                      </td>
                    </tr>
                    {{-- Display your orders here --}}

                   

                @endforeach
                
            </tbody>
        </table>
        <div>
        {{ $orders->links() }}
      </div>
        </div>
        </div>
    @endsection