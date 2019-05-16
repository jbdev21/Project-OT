<template>
    <div>
        wfwefwef
    </div>
</template>
<script>


export default {
    data(){
        return {
            YT: ''     
        }
    },
    created()
    {
       new YT.Player('player', {
          height: '390',
          width: '640',
          videoId: 'M7lc1UVf-VE',
          events: {
            'onReady': this.onPlayerReady,
            'onStateChange': this.onPlayerStateChange
          }
        });
    },
    methods:{
        
        onPlayerReady(event) {
            event.target.playVideo();
        },
        
        onPlayerStateChange(event) {
            if (event.data == YT.PlayerState.PLAYING && !this.done) {
            setTimeout(stopVideo, 6000);
                this.done = true;
            }
        },
        
        stopVideo() {
            player.stopVideo();
        }
        
    }
}
</script>
