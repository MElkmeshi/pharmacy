@extends('aside_bar')


@section('name')
    <link rel="stylesheet" href="css/disproduct.css">
@endsection
@section('card')
<div class="details">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Customers</h2>
            
        </div>

        <table>
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Action</td>
                </tr>
            </thead>
            
            
            <tbody>

                
                <tr>
                    <td>mohamed</td>
                    
                    <td>
                        <a href="#"><button class="edit">Edit</button></a>
                        <a href="#"><button class="delete">Delete</button>
                        </a></td>
                </tr>
                 
                <tr>
                    <td>mohamed</td>
                    
                    <td>
                        <a href="#"><button class="edit">Edit</button></a>
                        <a href="#"><button class="delete">Delete</button>
                        </a></td>
                </tr>
                 
                <tr>
                    <td>mohamed</td>
                    
                    <td>
                        <a href="#"><button class="edit">Edit</button></a>
                        <a href="#"><button class="delete">Delete</button>
                        </a></td>
                </tr> 
            </tbody>
        </table>
    </div>
@endsection