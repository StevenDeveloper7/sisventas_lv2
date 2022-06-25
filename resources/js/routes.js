const Home = () => import('./components/Home.vue')

const Mostrar = () => import('./components/cliente/Mostrar.vue')
const Crear = () => import('./components/cliente/Crear.vue')
const Editar = () => import('./components/cliente/Editar.vue')

const MostrarCategoria = () => import('./components/categoria_producto/MostrarCategoria.vue')
const CrearCategoria = () => import('./components/categoria_producto/CrearCategoria.vue')
const EditarCategoria = () => import('./components/categoria_producto/EditarCategoria.vue')

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },

    {
        name: 'mostrarClientes',
        path: '/clientes',
        component: Mostrar
    },
    {
        name: 'crearCliente',
        path: '/crear',
        component: Crear
    },
    {
        name: 'editarCliente',
        path: '/editar/:id',
        component: Editar
    },

    {
        name: 'mostrarCategorias',
        path: '/categorias',
        component: MostrarCategoria
    },
    {
        name: 'crearCategoria',
        path: '/crearCategoria',
        component: CrearCategoria
    },
    {
        name: 'editarCategoria',
        path: '/editarCategoria/:id',
        component: EditarCategoria
    },

]