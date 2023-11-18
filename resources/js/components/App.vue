<template>
    <div>
        <div>
            <nav style="min-height: 4rem;" class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-light bg-gradient-x-grey-blue">
                <div class="navbar-wrapper">
                    <div class="navbar-header">
                        <ul class="nav navbar-nav flex-row">
                            <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs is-active" href="#"><i class="feather icon-menu font-large-1"></i></a></li>
                            <li class="nav-item"><a class="navbar-brand" href="html/ltr/vertical-menu-template/index.html"><img class="brand-logo" alt="stack admin logo" src="/app-assets/images/logo/stack-logo.png">
                                    <h2 class="brand-text">Stack</h2>
                                </a></li>
                            <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
                        </ul>
                    </div>
                    <div class="navbar-container content">
                        <div class="collapse navbar-collapse" id="navbar-mobile">
                            <ul class="nav navbar-nav mr-auto float-left">
                                <li class="nav-item d-none d-md-block">
                                    <a class="nav-link nav-menu-main menu-toggle hidden-xs is-active" href="#">
                                        <i class="feather icon-menu"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav float-right">
                                <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                        <div class="avatar avatar-online"><img :src="'/imagenes_usuarios/'+datos.imagen" alt="avatar"><i></i></div><span class="user-name">{{ datos.nombre }}</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <router-link to="mi-perfil">
                                            <a class="dropdown-item" href="user-profile.html">
                                                <i class="feather icon-user"></i> Mi Perfil
                                            </a>
                                        </router-link>
                                        <a class="dropdown-item" href="app-chat.html">
                                            <i class="feather icon-message-square"></i> Chats
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a style="color: red" class="dropdown-item" href="login-with-bg-image.html">
                                            <i class="feather icon-power"></i> Cerrar Sesión
                                        </a>
                                    </div>
                                </li>
                                <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon feather icon-maximize"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true" style="touch-action: none; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                <div class="main-menu-content ps ps--active-y">
                    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                        <li class=" navigation-header"><span>Menu de Opciones</span><i class=" feather icon-minus" data-toggle="tooltip" data-placement="right" data-original-title="Apps"></i>
                        </li>
                        <li :class="tipo_ruta == '/dashboard' ? 'nav-item open' : 'nav-item'">
                            <router-link to="/dashboard">
                                <a href="#">
                                    <i class="fas fa-home"></i>
                                    <span class="menu-title" data-i18n="Email Application">Dashboard</span>
                                </a>
                            </router-link>
                        </li>
                        <li :class="tipo_ruta == '/lista-caracterizados' ? 'nav-item open' : 'nav-item'">
                            <router-link to="/lista-caracterizados">
                                <a href="#">
                                    <i class="fas fa-user-check"></i>
                                    <span class="menu-title" data-i18n="Email Application">caracterización</span>
                                </a>
                            </router-link>
                        </li>
                        <li :class="tipo_ruta == '/usuarios' ? 'nav-item open' : 'nav-item'">
                            <router-link to="/usuarios">
                                <a href="#">
                                    <i class="fas fa-users"></i>
                                    <span class="menu-title" data-i18n="Email Application">Gestión Usuarios</span>
                                </a>
                            </router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="app-content content" style="padding-top: 4rem;">
            <div class="content-overlay"></div>
            <div class="content-wrapper">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <router-view to="/"></router-view>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import * as usuarioService from "../services/usuario_service.js";


export default {
    data() {
        return {
            tipo_ruta: "",
            datos: {
                nombre: "",
                imagen: ""
            }
        }
    },
    mounted() {
        this.misDatos();
        setTimeout(()=>{
            const rutaActual = this.$route.path;
            console.log("Ruta actual:", rutaActual);
            this.tipo_ruta = rutaActual;
        }, 500)
    },
    methods: {
        misDatos: async function () {
            this.loading = true;
            try {
                await usuarioService.misDatos().then(respuesta => {
                    this.datos = respuesta.data;
                    this.loading = false;
                });
            } catch (error) {
                console.log(error);
            }
        },
    }
}
</script>