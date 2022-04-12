@extends('layouts.base')

@section('title', 'Hotel offers')

@section('main')

    <table class="table table-stripepd">
        <thead>
          <tr>
              <th>Hotel</th>
              <th class="thead-dark">City ▼▲</th>
              <th class="thead-dark">Arrival Date ▼▲</th>
              <th>Nights</th>
              <th>Rooms quiantity</th>
              <th class="thead-dark">Price ▼▲</th>
          </tr>
        </thead>
        <tbody>
        @foreach($offers as $offer)
          <tr>
              <td>
                  <h3>{{$offer->offer_hotel}}</h3>
              </td>
              <td>{{$offer->offer_city}}</td>
              <td>{{$offer->offer_arrival_date}}</td>
              <td>{{$offer->offer_nights}}</td>
              <td>{{$offer->offer_rooms_quantity}}</td>
              <td>{{$offer->offer_price}}</td>
              <td>
                  <a href="{{route('detail',['offer'=>$offer->id])}}">About...</a>
              </td>
          </tr>
        @endforeach
        </tbody>
    </table>


<script> document.addEventListener('DOMContentLoaded', () => {

        const getSort = ({ target }) => {
            const order = (target.dataset.order = -(target.dataset.order || -1));
            const index = [...target.parentNode.cells].indexOf(target);
            const collator = new Intl.Collator(['en', 'ru'], { numeric: true });
            const comparator = (index, order) => (a, b) => order * collator.compare(
                a.children[index].innerHTML,
                b.children[index].innerHTML
            );

            for(const tBody of target.closest('table').tBodies)
                tBody.append(...[...tBody.rows].sort(comparator(index, order)));

            for(const cell of target.parentNode.cells)
                cell.classList.toggle('sorted', cell === target);
        };

        document.querySelectorAll('.thead-dark').forEach(tableTH => tableTH.addEventListener('click', () => getSort(event)));
        console.log(document.querySelectorAll('.thead-dark'))
    });

</script>
@endsection('main')
