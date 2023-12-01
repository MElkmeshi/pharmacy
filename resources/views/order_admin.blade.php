@extends('aside_bar')


@section('name')
    <link rel="stylesheet" href="css/disproduct.css">
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
.status.delivered {
  padding: 2px 4px;
  background: #8de02c;
  color: var(--white);
  border-radius: 4px;
  font-size: 14px;
  font-weight: 500;
}
.status.pending {
  padding: 2px 4px;
  background: #e9b10a;
  color: var(--white);
  border-radius: 4px;
  font-size: 14px;
  font-weight: 500;
}
.status.return {
  padding: 2px 4px;
  background: #f00;
  color: var(--white);
  border-radius: 4px;
  font-size: 14px;
  font-weight: 500;
}
.status.inProgress {
  padding: 2px 4px;
  background: #1795ce;
  color: var(--white);
  border-radius: 4px;
  font-size: 14px;
  font-weight: 500;
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
                  <option value="cancelled" {{ $statusFilter === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                  <option value="delivered" {{ $statusFilter === 'delivered' ? 'selected' : '' }}>Delivered</option>
                  <option value="processing" {{ $statusFilter === 'processing' ? 'selected' : '' }}>Processing</option>
              </select>
              <button type="submit">Filter</button>
          </form>
           
          <table>
            <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->total_amount }}</td>
                        <td>{{ $order->status }}</td>
                        <td>{{ $order->address }}</td>
                        <td>
                           
                            <a href="{{ route('order.action', ['order_id' => $order->id,'button_name' => 'cancelled']) }}"><button>Cancelled</button></a>
                            <a href="{{ route('order.action', ['order_id' => $order->id,'button_name' => 'delivered']) }}"><button>Delivered</button></a>
                            <a href="{{ route('order.action', ['order_id' => $order->id,'button_name' => 'processing']) }}"><button>Processing</button></a>
                            
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <h3>Order Items</h3>
                            <ul>
                                @foreach ($order->orderItems as $orderItem)
                                    <li>
                                        Product Name: {{ $orderItem->product->name }}
                                        <br>
                                        Quantity: {{ $orderItem->quantity }}
                                       <br>
                                       <br>
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5"><hr></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        </div>
        </div>
    @endsection