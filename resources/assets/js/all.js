var totalItems = $('.item').length;
$('.item').first().addClass('active');
$('.item').first().children().first().addClass('playing-video');
// $('.playing-video').get(0).play();
$('#video1detail').addClass('project-detail-showing');
$('#video1detail').show();

$('.right').click(function () {
    $('.project-detail-showing').hide();
    $('.project-detail-showing').removeClass();
    var video = $('.playing-video').get(0);
    if(video.paused==false){
        video.pause();
    }
    $('.playing-video').removeClass();
    currentIndex = $('div.active').index() + 1;
    videoIndex = currentIndex+1;
    if(videoIndex>totalItems){
        videoIndex = 1;
    }
    // $('#video'+videoIndex).get(0).play();
    $('#video'+videoIndex).addClass('playing-video');
    $('#video'+videoIndex+'detail').show();
    $('#video'+videoIndex+'detail').addClass('project-detail-showing');
    // $('.play-button').get(0).innerHTML = 'Play';
});

$('#left').click(function () {
    $('.project-detail-showing').hide();
    $('.project-detail-showing').removeClass();
    var video = $('.playing-video').get(0);
    if(video.paused==false){
        video.pause();
    }
    $('.playing-video').removeClass();
    currentIndex = $('div.active').index()-1;
    videoIndex = currentIndex+1;
    if(currentIndex<0){
        videoIndex = totalItems;
    }
    // $('#video'+videoIndex).get(0).play();
    $('#video'+videoIndex).addClass('playing-video');
    $('#video'+videoIndex+'detail').show();
    $('#video'+videoIndex+'detail').addClass('project-detail-showing');
    // $('.play-button').get(0).innerHTML = 'Play';
});

function showHideDetail(){
    videoIndex = $('div.active').index()+1;
    var detail = $('#video'+videoIndex+'detail');
    detail.toggle('slow');
}

function playPauseVideo(){
    var video = $('.playing-video').get(0);
    if(video.paused == true){
        video.play();
    } else{
        video.pause();
    }
}
