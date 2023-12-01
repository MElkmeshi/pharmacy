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
label {
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
              <label for="status">Filter by Status:</label>
              <select name="status" id="status">
                  <option value="all" {{ $statusFilter === 'all' ? 'selected' : '' }}>All</option>
                  <option value="pending" {{ $statusFilter === 'pending' ? 'selected' : '' }}>Pending</option>
                  <option value="delivered" {{ $statusFilter === 'delivered' ? 'selected' : '' }}>Delivered</option>
                  <option value="inprogress" {{ $statusFilter === 'inprogress' ? 'selected' : '' }}>In Progress</option>
              </select>
              <button type="submit">Filter</button>
          </form>
           
            <table>
                <thead>
                    <tr>
                        <td>id</td>
                        <td>Name</td>
                        <td>Price</td>
                        <td>Address</td>
                        <td>Status</td>
                        <td>Action</td>
                    </tr>
                </thead>

                <tbody>
                    
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->user_id }}</td>
                        <td>namee</td>
                        <td>{{ $order->total_amount }}</td>
                        <td>{{ $order->address }}</td>
                        <td><span class="status {{ $order->status }}">{{ $order->status }}</span></td>
                        <td>change state</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        </div>
    @endsection