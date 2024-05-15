<div class="row mt-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form>
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Search employee"
                                    id="search">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <img src="https://assets.tokopedia.net/assets-tokopedia-  lite/v2/zeus/kratos/af2f34c3.svg"
                                            alt="">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div id="search-results"></div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#search').on('keyup', function() {
            let query = $(this).val();
            //alert(query)
            $.ajax({
                url: '/search',
                type: 'get',
                data: {
                    query: query
                },
                success: function(response) {
                    //alert(response)
                    //console.log(response)
                    $('#search-results').empty();
                    if (response.length > 0) {
                        //console.log(response)
                        $.each(response, function(index, user) {

                            $('#search-results').append(
                                `<div class="card">
                                <div class="card-body">
                                <h5 class="card-title">${user.name}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">${user.department ? user.department.name : 'N/A'}</h6>
                                <p class="card-text">${user.designation ? user.designation.name : 'N/A'}</p>
                                
                                </div>
                                </div>
                                </div>`
                            );
                        });
                    } else {
                        $('#search-results').append('<h3>No results found.</h3>');
                    }

                }
            })
        });
    });
</script>
@endpush