let video = document.querySelector('video')

navigator.mediaDevices.getUserMedia({video:true})
.then(stream =>{
    video.srcObject = stream;
    video.play
})
.catch(error=>{
    console.log(error)
})

document.querySelector('.button').addEventListener('click',()=>{
            
        let canvas = document.querySelector('canvas')
        canvas.height = video.videoHeight
        canvas.width = video.videoWidth
        document.querySelector('.videoBox').style.display = 'none'
        document.querySelector('.canvasBox').style.display = 'flex'


        let context = canvas.getContext('2d')
       
        context.drawImage(video, 0,0)
            

        canvas.toBlob( (blob) => {
        const file = new File( [ blob ], "foto anexada.jpg" );
        const dT = new DataTransfer();
        dT.items.add( file );
        document.querySelector( "#file" ).files = dT.files;
} );

})
function teste(){
    document.querySelector('.videoBox').style.display = 'flex'
        document.querySelector('.canvasBox').style.display = 'none'
}