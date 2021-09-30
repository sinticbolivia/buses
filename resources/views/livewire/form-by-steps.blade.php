
<div class="max-w-7xl mx-auto px-4 w-full sm:px-6 lg:px-8 bg-yellow-500 ">
    <div class="flex justify-between h-16">
        <div class="flex">
            <div class="flex-shrink-0 flex items-center ">
                <span>EXPRESO TARIJA </span>
                @if($currentTrip)
                    {{$currentTrip}}
                @endif
            </div>
        </div>
    </div>
</div>
<div class="p-5 bg-gray-100">
    <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
        <div class="w-full sm:max-w-5xl mt-6 p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose">
            <div class="mx-4 p-4">
                <div class="flex items-center">
                    <div class="container-indicator flex items-center text-indigo-600 relative">
                            <div
                                class="indicator rounded-full transition duration-500 ease-in-out h-12 w-12 py-3 border-2 border-indigo-600"
                            >
                                 <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="100%"
                                    height="100%"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"

                                    class="feather feather-bookmark"
                                >
                                    <path d="M17.27 5.707a.47.47 0 0 0-.45-.328H7.18a.47.47 0 0 0-.45.328L5.035 11.16a.47.47 0 0 0 .45.606h13.03a.47.47 0 0 0 .45-.606ZM6.12 10.828l1.402-4.512h8.954l1.402 4.512Zm0 0"/><path d="M22.594 6.805h-1.078c-.211 0-.414.043-.594.12V1.419c0-.684-.559-1.238-1.238-1.238h-5.446a.468.468 0 1 0 0 .938h5.446c.164 0 .3.136.3.3V8.09l-.125-.402-.925-2.965a1.74 1.74 0 0 0-1.668-1.23H6.734a1.74 1.74 0 0 0-1.668 1.23l-.984 3.16V1.418a.3.3 0 0 1 .3-.3h5.712a.465.465 0 0 0 .469-.47.468.468 0 0 0-.47-.468h-5.71c-.684 0-1.238.554-1.238 1.238v5.535a1.544 1.544 0 0 0-.66-.148H1.405C.63 6.805 0 7.434 0 8.21v2.371c0 .773.629 1.406 1.406 1.406h1.672v6.953c0 .973.754 1.77 1.707 1.852v1.777c0 .688.559 1.25 1.246 1.25h1.867c.688 0 1.25-.562 1.25-1.25V20.8h5.512v1.77c0 .688.559 1.25 1.246 1.25h1.871a1.25 1.25 0 0 0 1.246-1.25V20.8h.036a1.865 1.865 0 0 0 1.863-1.859v-6.953h1.672c.777 0 1.406-.633 1.406-1.406V8.211c0-.777-.629-1.406-1.406-1.406ZM.937 10.582V8.211a.47.47 0 0 1 .47-.469h1.077c.329 0 .594.266.594.594v2.715H1.406a.47.47 0 0 1-.468-.469ZM8.212 22.57c0 .172-.14.313-.313.313H6.031a.31.31 0 0 1-.308-.313V20.8H8.21Zm4.914-5.343h-2.121v-1.5c0-.11.09-.2.2-.2h1.722c.11 0 .199.09.199.2Zm-2.121 2.636v-1.699h2.121v1.7Zm7.082 2.707c0 .172-.14.313-.309.313h-1.87a.313.313 0 0 1-.31-.313V20.8h2.489Zm1.898-3.629a.924.924 0 0 1-.925.922h-4.997v-4.136a1.14 1.14 0 0 0-1.136-1.137h-1.723c-.629 0-1.137.512-1.137 1.137v4.136H4.941a.924.924 0 0 1-.925-.922v-7.695L5.96 5a.809.809 0 0 1 .773-.57h10.532c.355 0 .668.23.773.57l1.945 6.246Zm3.078-8.359a.47.47 0 0 1-.468.469h-1.672V8.332c0-.324.265-.59.594-.59h1.078a.47.47 0 0 1 .468.469Zm0 0"/><path d="M7.996 14.59H6.312c-.55 0-.996.45-.996.996v1.406c0 .551.446.996.997.996h1.683a.998.998 0 0 0 .996-.996v-1.406a1 1 0 0 0-.996-.996Zm.059 2.402a.06.06 0 0 1-.059.059H6.312a.06.06 0 0 1-.058-.059v-1.406a.06.06 0 0 1 .059-.059h1.683a.06.06 0 0 1 .059.059ZM17.824 14.59h-1.683a.997.997 0 0 0-.993.996v1.406c0 .551.446.996.993.996h1.683c.551 0 .996-.445.996-.996v-1.406a.998.998 0 0 0-.996-.996Zm.059 2.402a.06.06 0 0 1-.059.059h-1.683c-.032 0-.055-.028-.055-.059v-1.406c0-.031.023-.059.055-.059h1.683a.06.06 0 0 1 .059.059ZM11.766.828a.472.472 0 0 0 .613.254.472.472 0 0 0 .254-.613.478.478 0 0 0-.613-.254.476.476 0 0 0-.254.613Zm0 0"/>
                                </svg>
                            </div>
                            <div
                                class="text-indicator absolute top-0 -ml-10 text-center mt-16 w-32 text-xs font-medium uppercase text-indigo-600"
                            >
                            Salidas
                            </div>
                    </div>
                    <div
                        class="line-indicator flex-auto border-t-2 transition duration-500 ease-in-out border-indigo-600"
                    ></div>
                    <div class="container-indicator flex items-center text-gray relative">
                            <div
                                class="indicator rounded-full transition duration-500 ease-in-out h-12 w-12 py-3 border-2 bg-indigo-600 border-indigo-600"
                            >

                                <svg xmlns="http://www.w3.org/2000/svg"
                                    width="100%"
                                    height="100%"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="feather feather-user-plus">
                                    <path d="M16.078 5.61a4.079 4.079 0 1 1-8.157-.001 4.079 4.079 0 0 1 8.157 0ZM22.828 7.11a2.578 2.578 0 1 1-5.156 0 2.578 2.578 0 0 1 5.156 0ZM6.328 7.11a2.578 2.578 0 1 1-5.156 0 2.578 2.578 0 0 1 5.156 0ZM6.29 12c-1.017-.832-1.935-.719-3.106-.719C1.43 11.281 0 12.7 0 14.441v5.121c0 .758.617 1.375 1.379 1.375 3.281 0 2.887.06 2.887-.144 0-3.625-.43-6.285 2.023-8.793Zm0 0"/><path d="M13.117 11.297c-2.05-.168-3.832.004-5.367 1.273-2.574 2.059-2.078 4.832-2.078 8.223 0 .898.73 1.645 1.64 1.645 9.895 0 10.29.316 10.875-.981.196-.441.141-.3.141-4.504 0-3.34-2.89-5.656-5.21-5.656ZM20.816 11.281c-1.18 0-2.093-.11-3.105.719 2.434 2.488 2.023 4.965 2.023 8.793 0 .203-.328.145 2.836.145.79 0 1.43-.641 1.43-1.426v-5.07c0-1.743-1.43-3.16-3.184-3.16Zm0 0"/>
                                </svg>
                            </div>
                            <div
                                class="text-indicator absolute top-0 -ml-10 text-center mt-16 w-32 text-xs font-medium uppercase text-indigo-600"
                            >
                            Pasajeros
                            </div>
                    </div>
                    <div
                            class="line-indicator flex-auto border-t-2 transition duration-500 ease-in-out border-gray-300"
                    ></div>
                    <div class="container-indicator flex items-center text-gray-500 relative">
                            <div
                                class="indicator rounded-full transition duration-500 ease-in-out h-12 w-12 py-3 border-2 border-gray-300"
                            >

                                <svg xmlns="http://www.w3.org/2000/svg"
                                    width="100%"
                                    height="100%"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="feather feather-mail">
                                    <path d="M22.355 17.332c-.777-.684-1.757-.988-2.753-.855L8.965 17.87l-.422-4.074a23.101 23.101 0 0 0-1.555-6.55l-.375-.938a3.04 3.04 0 0 0-1.55-1.633 3 3 0 0 0 .113-2.164c-.004-.008-.004-.016-.008-.02A3.956 3.956 0 0 0 1.57 0 1.25 1.25 0 0 0 .566.465c-.25.3-.343.695-.257 1.078l3.53 15.414c.044.191.231.309.423.27a.355.355 0 0 0 .27-.422L2.112 5.953a.713.713 0 0 1 .715-.871l1.012.02c.207.007.41.039.605.093l.028.012A2.327 2.327 0 0 1 5.957 6.57l.375.938a22.26 22.26 0 0 1 1.508 6.355v.004l.422 4.098-.668.086a1.986 1.986 0 0 0-3.535 1.613v.008l.867 3.594a.954.954 0 0 0 .933.734h13.57c1.005 0 1.821-.809 1.833-1.809h.824c.902 0 1.637-.789 1.637-1.757 0-1.207-.496-2.34-1.368-3.102ZM4.387 4.457a3.033 3.033 0 0 0-.535-.059L2.84 4.375a1.4 1.4 0 0 0-1.016.402l-.828-3.39A.579.579 0 0 1 1.11.91a.565.565 0 0 1 .446-.203 3.247 3.247 0 0 1 2.953 2.035c.183.57.137 1.18-.121 1.715Zm1.472 18.836a.258.258 0 0 1-.25-.195l-.863-3.59a1.283 1.283 0 0 1 .973-1.524 1.281 1.281 0 0 1 1.527.973l1.008 4.336Zm16.227-1.805h-3.98a.353.353 0 0 0-.356.352c0 .195.16.351.355.351h2.45a1.126 1.126 0 0 1-1.125 1.102H8.98l-.253-1.102h7.734a.35.35 0 0 0 .352-.351.35.35 0 0 0-.352-.352H8.559l-.621-2.687a1.972 1.972 0 0 0-.024-.078l11.781-1.547c.793-.106 1.57.14 2.196.687.714.63 1.125 1.567 1.125 2.57 0 .583-.418 1.055-.93 1.055Zm0 0"/></svg>
                            </div>
                            <div
                                class="text-indicator absolute top-0 -ml-10 text-center mt-16 w-32 text-xs font-medium uppercase text-gray-500"
                            >Asientos
                            </div>
                    </div>
                    <div
                        class="line-indicator flex-auto border-t-2 transition duration-500 ease-in-out border-gray-300"
                    ></div>
                    <div class="container-indicator flex items-center text-gray-500 relative">
                            <div
                                class="indicator rounded-full transition duration-500 ease-in-out h-12 w-12 py-3 border-2 border-gray-300"
                            >

                                <svg xmlns="http://www.w3.org/2000/svg"
                                    width="100%"
                                    height="100%"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="feather feather-database"><path d="M20.39 8.02H.345A.342.342 0 0 0 0 8.363v9.625c0 .188.152.34.344.344h13.633a.347.347 0 0 0 .343-.344.344.344 0 0 0-.343-.343H.687V8.707h19.36v.86c0 .19.152.343.344.343a.342.342 0 0 0 .343-.344V8.363a.344.344 0 0 0-.343-.343ZM18.063 6.426l-16.04-3.61a.36.36 0 0 0-.261.043.36.36 0 0 0-.149.22L.81 6.683a.345.345 0 0 0 .671.152l.727-3.274L17.91 7.095c.024.008.05.011.074.008a.342.342 0 0 0 .078-.676ZM16.113 4.438 6.493.426A.345.345 0 0 0 6.05.59l-.805 1.605a.342.342 0 0 0 .14.465.342.342 0 0 0 .47-.137c.003-.007.003-.015.007-.02l.66-1.316 9.325 3.883a.346.346 0 0 0 .453-.183.345.345 0 0 0-.188-.45Zm0 0"/><path d="M16.355 9.625h-3.18a.344.344 0 0 0 0 .688h3.18a.344.344 0 0 0 0-.688ZM9.965 9.648a3.528 3.528 0 0 0-3.527 3.528 3.53 3.53 0 0 0 7.059 0 3.53 3.53 0 0 0-3.532-3.528Zm0 6.415a2.887 2.887 0 1 1 .001-5.775 2.887 2.887 0 0 1-.001 5.774ZM19.59 10.77c-2.125 0-4.41.5-4.41 1.605v9.621c0 1.102 2.285 1.606 4.41 1.606S24 23.098 24 21.996v-9.621c0-1.105-2.285-1.605-4.41-1.605Zm3.61 11.218c-.063.223-1.266.809-3.61.809-2.348 0-3.547-.586-3.61-.8v-.63c.856.43 2.262.63 3.61.63 1.344 0 2.754-.204 3.61-.63Zm0-1.601c-.063.222-1.266.808-3.61.808-2.348 0-3.547-.586-3.61-.804v-.63c.856.43 2.262.63 3.61.63 1.344 0 2.754-.2 3.61-.63Zm0-1.606c-.063.223-1.266.809-3.61.809-2.348 0-3.547-.586-3.61-.8v-.634c.856.434 2.262.633 3.61.633 1.344 0 2.754-.203 3.61-.633Zm0-1.601c-.063.222-1.266.808-3.61.808-2.348 0-3.547-.586-3.61-.804v-.63c.856.43 2.262.63 3.61.63 1.344 0 2.754-.204 3.61-.63Zm0-1.606c-.063.223-1.266.809-3.61.809-2.348 0-3.547-.586-3.61-.801v-.633c.856.43 2.262.633 3.61.633 1.344 0 2.754-.203 3.61-.633Zm0-1.601c-.063.222-1.266.804-3.61.804-2.348 0-3.547-.582-3.61-.8v-.63c.856.426 2.262.63 3.61.63 1.344 0 2.754-.204 3.61-.63Zm-3.61-.797c-2.344 0-3.543-.586-3.61-.797.067-.223 1.266-.809 3.61-.809 2.324 0 3.527.575 3.61.805-.083.227-1.286.8-3.61.8Zm0 0"/><path d="M6.758 16.04H3.727l-1.434-1.571v-2.61l1.586-1.546h2.879a.344.344 0 0 0 0-.688h-3.02a.353.353 0 0 0-.242.098l-1.789 1.746a.432.432 0 0 0-.105.281v2.852c0 .085.035.168.09.23l1.632 1.781a.34.34 0 0 0 .25.114h3.184a.344.344 0 0 0 0-.688ZM10.168 12.773h-.402c-.125 0-.2-.07-.2-.097 0-.031.075-.102.2-.102h1.004a.401.401 0 0 0 0-.8h-.403a.401.401 0 1 0-.8 0v.015a.931.931 0 0 0-.801.883.95.95 0 0 0 1 .902h.402c.125 0 .2.07.2.102 0 .031-.075.101-.2.101H9.164a.398.398 0 0 0-.398.399c0 .222.175.402.398.402h.402a.401.401 0 1 0 .801 0v-.02a.93.93 0 0 0 .801-.878.958.958 0 0 0-1-.907Zm0 0"/></svg>

                            </div>
                            <div
                                class="text-indicator absolute top-0 -ml-10 text-center mt-16 w-32 text-xs font-medium uppercase text-gray-500"
                            >
                            Pagar
                            </div>
                    </div>
                </div>
            </div>
            <div class="w-full sm:max-w-5xl mt-6 p-8 bg-white overflow-hidden sm:rounded-lg prose slot-step">
                <livewire:steps.step1/>
            </div>
            <div class="w-full sm:max-w-5xl mt-6 p-8 bg-white overflow-hidden sm:rounded-lg prose slot-step">
                 <livewire:steps.step2/>
            </div>

            <div class="w-full sm:max-w-5xl mt-6 p-8 bg-white overflow-hidden sm:rounded-lg prose slot-step">
                <span>Asientos {{$quantitySeats}}</span>

                <livewire:steps.step3 venta="{{ json_encode($venta->id) }}" />
            </div>
            <div class="w-full sm:max-w-5xl mt-6 p-8 bg-white overflow-hidden sm:rounded-lg prose slot-step">
                <span>Pagar</span>
                <livewire:steps.step4/>
               

            </div>

            <div class="mt-8 p-4">
                <div class="flex p-2 mt-4">
                    <button
                        class="prev bg-indigo-600 text-white active:bg-purple-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                        type="button"
                        id="prev-button">
                        Anterior
                    </button>
                
                    <div class="flex-auto flex flex-row-reverse">
                        <button
                            id="next-button"
                            wire:click="libelula"
                            class="next mx-3 bg-indigo-600 text-white active:bg-purple-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                            type="button">
                            Siguiente
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
