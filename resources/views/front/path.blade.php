<div class="string">
    <svg viewBox="0 0 500 160" preserveAspectRatio="none">
        <path d="M 10 100 Q 250 100 490 100" stroke="black" stroke-width="3" fill="transparent"/>
    </svg>
</div>

<style>
.string{
    width:100%;
    padding:10px;
}

.string svg{
    width:100%;
    height:160px;
    display:block;
}
</style>

@push('script')
<script>

gsap.registerPlugin();

let path = document.querySelector(".string path");
let string = document.querySelector(".string");

let initialPath = "M 10 100 Q 250 100 490 100";

string.addEventListener("mousemove", function(e){

    let bounds = string.getBoundingClientRect();
    let x = e.x;
    let y = e.y;

    let newPath = `M 10 100 Q ${x} ${y} 490 100`;

    gsap.to(path,{
        attr:{ d:newPath },
        duration:0.2,
        ease:"power3.out"
    });

});

string.addEventListener("mouseleave", function(){

    gsap.to(path,{
        attr:{ d:initialPath },
        duration:1,
        ease:"elastic.out(1,0.2)"
    });

});

</script>
@endpush