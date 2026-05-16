@props([
    'steps' => []
])

<div class="triangle-wrapper ">
    <div class="triangle-container">

        @foreach ($steps as $index => $step)
            <div class="triangle-level animate__animated animate__slideInDown" style="width: {{ 100 - ($index * 12) }}%;animation-delay: {{ $index * 0.2 }}s;">

                <div class="glass-card glass-card-{{ $index + 1 }}">
                    <h4>{{ $step['title'] }}</h4>
                    <p>{{ $step['description'] }}</p>
                </div>

            </div>
        @endforeach

    </div>
</div>

<style>
.triangle-wrapper {
  padding: 3rem 1rem;
  display: flex;
  justify-content: center;
  perspective: 1200px;
}

.triangle-container {
  width: 100%;
  max-width: 550px;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 10px;
  transform-style: preserve-3d;
}

.triangle-level {
  display: flex;
  justify-content: center;
  transition: all 0.4s ease;
}

/* Glass card */
.glass-card {
  position: relative;
  width: 100%;
  padding: 10px 2.5rem;
  text-align: center;
  border-radius: 20px;
  border-bottom-left-radius: 120px;
  border-bottom-right-radius: 120px;

  backdrop-filter: blur(18px);
  -webkit-backdrop-filter: blur(18px);

  border: 1px solid rgba(255,255,255,0.2);

  box-shadow:
    0 8px 20px rgba(0,0,0,0.2),
    inset 0 1px 1px rgba(255,255,255,0.15),
    inset 0 -4px 8px rgba(0,0,0,0.1);

  z-index: 1;
  transition: all 0.5s ease-in-out;
  cursor: pointer;
}

.glass-card:hover{
  transform: scale(1.1);
}

.glass-card:hover h4{
  letter-spacing: 3px;
}

.glass-card h4,
.glass-card p {
  position: relative;
  z-index: 2;
  color: #fff;
  text-shadow: 0 0 5px #fff;
  transition: 1s;
}

.glass-card h4 {
  font-weight: 700;
  font-size: 1.3rem;
  margin-bottom: 0.5rem;
}

.glass-card p {
  font-size: 0.95rem;
  color: rgba(255,255,255,0.85);
}

/* Gradient colors */
.glass-card-1{
  background: linear-gradient(105deg,#A882FD,#52B9F2);
}

.glass-card-2{
  background: linear-gradient(105deg,#E9742D,#FBCC4F);
}

.glass-card-3{
  background: linear-gradient(105deg,#E166BA,#8A3C7A);
}

.glass-card-4{
  background: linear-gradient(105deg,#CF6CE1,#E8B2FB);
}

.glass-card-5{
  background: linear-gradient(105deg,#84fd82,#52B9F2);
}

.glass-card-6{
  background: linear-gradient(105deg,#fd8286,#c129ba);
}

.glass-card-7{
  background: linear-gradient(105deg,#dd3f3f,#52B9F2);
}

/* Mobile */
@media (max-width:768px){
  .triangle-wrapper{
    perspective:none;
  }

  .glass-card{
    transform:none;
  }
}
</style>
