<x-app-layout>
    <x-slot name="header">

        <x-jet-nav-link href="{{ route('today') }}" :active="request()->routeIs('today')">
            {{ __("Aujourd'hui") }}
        </x-jet-nav-link>
        <x-jet-nav-link href="{{ route('week') }}" :active="request()->routeIs('week')">
            {{ __("cette semaine") }}
        </x-jet-nav-link>
        <x-jet-nav-link href="{{ route('indexactions') }}" :active="request()->routeIs('indexactions')">
            {{ __('Toutes les actions') }}
        </x-jet-nav-link> 
        <x-jet-nav-link href="{{ route('creataction') }}" :active="request()->routeIs('creataction')">
            {{ __('Ajouter une action') }}
        </x-jet-nav-link>
    </x-slot>

    @if (session('message'))
        <div class="flex items-center bg-lime-500 text-white text-sm font-bold px-4 py-3" x-data="{ show: true }"
            x-show="show" x-init="setTimeout(() => show = false, 1500)">
            <p>{{ session('message') }}</p>
        </div>
    @endif

    <main class="relative min-h-screen">
        {{-- <div class="px-10 relative md:fixed md:w-4/12 min-h-screen in flex items-center justify-content">
            <div class="flex flex-col">
                <h1 class="pageContentTitle">les actions du 
                    <span class="italic font-light">** {{ $today }} ** </span>
                </h1>
                <p class="text-kramp-500">Les actions à effectuer à une date ou une heure spécifique vont dans le
                    Calendrier.
                </p>
            </div>
        </div> --}}
        <div class="ml-auto py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-3 gap-6">
                    {{-- {{ dd($action->pivot)}} --}}
                    <div class="col-start-1 flex flex-col gap-y-4">
                        <h3 class="font-bold text-xl">TODO</h3>
                        @forelse ($actions as $action)
                            @foreach ($action->contexts as $contextaction)
                                {{-- {{ dd($contextaction->pivot->context_id)}} --}}
                                @if ($contextaction->pivot->context_id == 1)
                                    <div id="action{{ $action->id }}"
                                        class="outline outline-orange-100 px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-row items-center justify-between">
                                        <a href="">
                                            <p class="">{{ $action->description }}</p>
                                        </a>
                                        <div class="flex flex-row">
                                            {{-- <a href="javascript:void(0)" onclick="" class="w-4 h-4 hover:w-8 hover:h-8">
                                                <img src="{{ asset('images/done.png') }}" alt="donebutton">
                                            </a> --}}
                                            <a href="{{ route('editaction', $action->id) }}" onclick=""
                                                class="w-4 h-4 hover:w-8 hover:h-8">
                                                <img src="{{ asset('images/edit.png') }}" alt="editbutton">
                                            </a>
                                            <a href="javascript:void(0)" onclick="deleteAction({{ $action->id }})"
                                                class="w-4 h-4 hover:w-6 hover:h-6"> <img
                                                    src="{{ asset('images/delete.png') }}" alt="deltebutton">
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @empty
                            <div
                                class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-40 flex flex-row items-center justify-between">
                                <p class="modelTitle">tu n'a aucune action</p>
                            </div>
                        @endforelse
                    </div>
                    <div class="col-start-2 flex flex-col gap-y-4">
                        <h3 class="font-bold text-xl">DOING</h3>
                        @forelse ($actions as $action)
                            @foreach ($action->contexts as $contextaction)
                                @if ($contextaction->pivot->context_id == 2)
                                    <div id="action{{ $action->id }}"
                                        class="outline outline-orange-100 px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-row items-center justify-between">
                                        <a href="">
                                            <p class="">{{ $action->description }}</p>
                                        </a>
                                        <div class="flex flex-row">
                                            {{-- <a href="javascript:void(0)" onclick="" class="w-4 h-4 hover:w-8 hover:h-8">
                                                <img src="{{ asset('images/done.png') }}" alt="donebutton">
                                            </a> --}}
                                            <a href="{{ route('editaction', $action->id) }}" onclick=""
                                                class="w-4 h-4 hover:w-8 hover:h-8">
                                                <img src="{{ asset('images/edit.png') }}" alt="editbutton">
                                            </a>
                                            <a href="javascript:void(0)" onclick="deleteAction({{ $action->id }})"
                                                class="w-4 h-4 hover:w-6 hover:h-6"> <img
                                                    src="{{ asset('images/delete.png') }}" alt="deltebutton">
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @empty
                            <div
                                class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-40 flex flex-row items-center justify-between">
                                <p class="modelTitle">tu n'a aucune action</p>
                            </div>
                        @endforelse
                    </div>
                    <div class="col-start-3 flex flex-col gap-y-4">
                        <h3 class="font-bold text-xl"> DONE</h3>

                        @forelse ($actions as $action)
                            @foreach ($action->contexts as $contextaction)
                                @if ($contextaction->pivot->context_id == 3)
                                    <div id="action{{ $action->id }}"
                                        class="outline outline-orange-100 px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-row items-center justify-between">
                                        <a href="">
                                            <p class="line-through">{{ $action->description }}</p>
                                        </a>
                                        <div class="flex flex-row">
                                            {{-- <a href="javascript:void(0)" onclick="" class="w-4 h-4 hover:w-8 hover:h-8">
                                                <img src="{{ asset('images/done.png') }}" alt="donebutton">
                                            </a> --}}
                                            <a href="{{ route('editaction', $action->id) }}" onclick=""
                                                class="w-4 h-4 hover:w-8 hover:h-8">
                                                <img src="{{ asset('images/edit.png') }}" alt="editbutton">
                                            </a>
                                            <a href="javascript:void(0)" onclick="deleteAction({{ $action->id }})"
                                                class="w-4 h-4 hover:w-6 hover:h-6"> <img
                                                    src="{{ asset('images/delete.png') }}" alt="deltebutton">
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @empty
                            <div
                                class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-40 flex flex-row items-center justify-between">
                                <p class="modelTitle">tu n'a aucune action</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
