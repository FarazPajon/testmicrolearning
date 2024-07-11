<div class="h-screen">
    <nav x-data="{ open: false }">
        <div class="fixed top-0 z-10 w-full border-b bg-white">
            <div class="flex items-center my-auto h-14">
                <div class="flex flex-1 items-center gap-2 p-2">
                    <a href="/dashboard" wire:navigate>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                    </a>
                    <svg class="w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/>
                    </svg>
                <span class="flex-1 text-lg font-bold truncate">{{ $mcl->judul }}</span>
            </div>
            <!-- Hamburger -->
            <div class="flex items-center -me-2 sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            @php $no = 1; @endphp
            @foreach ($mcl->pembelajaran as $pmb)
                <div class="flex items-center p-2 text-lg leading-4 gap-x-1 min-h-12 hover:bg-gray-100 {{$no==$pbs->id?'bg-gray-200':''}}" wire:click='pembelajaran({{ $pmb->id }})'>
                    <div>{{ $no++ }}.</div><div>{{ $pmb->judul }}</div>
                </div>
            @endforeach
        </div>
    </nav>
    <!-- Main Content -->
    <div class="flex w-full h-full pt-16">
        <div class="flex-1 flex">
            <!-- Left Side List -->
            <div class="w-1/4 hidden flex-col sm:block lg:block justify-between bg-white shadow rounded-lg p-4 mr-4">
                <div class="flex-1 overflow-auto">
                    <h2 class="text-xl font-bold mb-4">Daftar Microlearning</h2>
                    <div class="space-y-2">
                        <!-- List Items -->
                        @php $no = 1; @endphp
                        @foreach ($mcl->pembelajaran as $pmb)
                        <div
                            class="flex items-center p-4 text-lg leading-4 gap-x-2 min-h-12 {{ $pmb->id == $pbs->id ? 'bg-green-500 text-white' : 'hover:bg-gray-100 text-gray-900' }} rounded-lg"
                            wire:click='pembelajaran({{ $pmb->id }})'>
                            <div>{{ $no++ }}.</div>
                            <div>{{ $pmb->judul }}</div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>

            <!-- Gambar baru -->

            <!--gambar lama-->
            <div class="flex-1 flex justify-center items-center bg-white p-12">
                <div class="grid grid-flow-row">
                    <div>
                        <img src="{{$pbs->refs['image']}}" alt="Microlearning Image" class="rounded-lg max-w-full h-aut p-12">
                    </div>
                    @if ($pbs)
                    <div class="flex flex-row justify-center">
                        <a href="{{ route('lesson.index', ['pbid' => $pbs->id, 'material' => $mat]) }}" wire:navigate>
                            @auth
                            <div class="w-64 bg-green-500 text-white p-4 text-xl rounded-lg text-center">Ikuti kelas</div>
                            @else
                            <div class="w-64 bg-green-500 text-white p-4 text-xl rounded-lg text-center">Login untuk mengikuti Kelas</div>
                            @endauth
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
