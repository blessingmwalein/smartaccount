<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item" :class="{ 'active': link.isActive }" v-for="link in links">
                                {{ link.name }}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{ title }}</h4>
                </div>
            </div>
        </div>
        <slot />
    </div>

</template>

<script>
export default {
    name: 'PageHolder',
    props: ['title', 'links'],
    components: {

    },
    data() {
        return {
        }
    },
}

</script>