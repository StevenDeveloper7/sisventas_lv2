<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>EditarCliente</h4></div>
                <div class="card-body">
                    <form @submit.prevent="actualizar">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="cedula" class="form-label"
                                    >Cedula</label
                                >
                                <input
                                    type="number"
                                    name="cedula"
                                    class="form-control"
                                    v-model="cliente.cedula"
                                />
                            </div>
                            <div class="col-md-4">
                                <label for="nombre" class="form-label"
                                    >Nombre</label
                                >
                                <input
                                    type="text"
                                    name="nombre"
                                    class="form-control"
                                    v-model="cliente.nombre"
                                />
                            </div>
                            <div class="col-md-5">
                                <label for="email" class="form-label"
                                    >Email</label
                                >
                                <input
                                    type="email"
                                    name="email"
                                    class="form-control"
                                    v-model="cliente.email"
                                />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="telefono" class="form-label"
                                    >Telefono</label
                                >
                                <input
                                    type="number"
                                    name="telefono"
                                    class="form-control"
                                    v-model="cliente.telefono"
                                />
                            </div>
                            <div class="col-md-6">
                                <label for="direccion" class="form-label"
                                    >Direccion</label
                                >
                                <input
                                    type="text"
                                    name="direccion"
                                    class="form-control"
                                    v-model="cliente.direccion"
                                />
                            </div>
                            <div class="col-md-2">
                                <label for="edad" class="form-label"
                                    >Edad</label
                                >
                                <input
                                    type="number"
                                    name="edad"
                                    class="form-control"
                                    v-model="cliente.edad"
                                />
                            </div>
                        </div>
                        <br />
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">
                                Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "editar-cliente",
    data() {
        return {
            cliente: {
                cedula: "",
                nombre: "",
                email: "",
                telefono: "",
                direccion: "",
                edad: "",
            },
        };
    },
    mounted() {
        this.mostrarcliente();
    },
    methods: {
        async mostrarcliente() {
            await this.axios
                .get(`/api/cliente/${this.$route.params.id}`)
                .then((response) => {
                    const { cedula, nombre, email, telefono, direccion, edad } =
                        response.data;
                    this.cliente.cedula = cedula;
                    this.cliente.nombre = nombre;
                    this.cliente.email = email;
                    this.cliente.telefono = telefono;
                    this.cliente.direccion = direccion;
                    this.cliente.edad = edad;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        async actualizar() {
            await this.axios
                .put(`/api/cliente/${this.$route.params.id}`, this.cliente)
                .then((response) => {
                    this.$router.push({ name: "mostrarClientes" });
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
};
</script>
