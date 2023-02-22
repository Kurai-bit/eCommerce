<div class="search-widget">
    <h3>Search on youtube</h3>
    <p>Search videos on youtube.</p>
    <div class="clearfix"> </div>
    <input type="text" placeholder="Youtube video" name="youtube-search" id="youtube-search" />
    <div class="youtube-search-results" hidden>
        <ul id="youtube-results-list">
        </ul>
    </div>
</div>

<script src="./scripts/jquery-3.4.1.js"></script>

<script>
    $('#youtube-search').on('keyup', function(e){
        console.log("HERE");
        $.ajax({
            url: "https://www.googleapis.com/youtube/v3/search?q=" + $(this).val() + "&part=snippet&paidcontent=false&chart=mostPopular&duration=short&orderby=viewCount&max-results=50&type=video&key=AIzaSyAGPExdw9H8QRxMuhY4WnWRocyKDM6nces",
            dataType: 'jsonp',
            method: 'GET',
            success: function (data){
                $.each(data.items, function(index, value){
                    var element = '<li data-name="' + value.snippet.title + '" data-id="' + value.id.videoId + '" data-image-url="' + value.snippet.thumbnails.high.url + '">' +
                        '<img src="' + value.snippet.thumbnails.default.url + '" alt=""/>'+ value.snippet.title + '</li>';
                    $('#youtube-results-list').prepend(element);
                    $('.youtube-search-results').show();
                });
            }
        });
    });
</script>
