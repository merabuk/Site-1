<template>
<div class="d-inline">
    <button type="button" :class="btnClass" data-toggle="modal" :data-target="dataTarget" v-html="btnHtml"></button>
    <div class="modal fade" :id="modalId" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">{{title}}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <p>{{text}}</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Закрити</button>
              <button type="button" class="btn btn-outline-light" v-on:click="doAction">{{actionText}}</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
</div>
</template>

<script>
    export default {
        props: {
            type: {
                type: String,
                required: false,
                default: 'default',
            },
            btnText: {
                type: String,
                required: false,
                default: '',
            },
            btnIcon: {
                type: String,
                required: false,
                default: '',
            },
            title: {
                type: String,
                required: true,
            },
            text: {
                type: String,
                required: true,
            },
            actionText: {
                type: String,
                required: false,
                default: 'Прийняти'
            },
            actionUrl: {
                type: String,
                required: false,
            },
            actionMethod: {
                type: String,
                required: true,
            },
            actionData: {
                type: String,
                required: false,
            },
            modalId: {
                type: String,
                required: true,
            }
        },
        data() {
            return {
                btnClass: 'btn btn-sm btn-'+this.type,
                dataTarget: '#'+this.modalId,
            }
        },
        computed: {
            btnHtml() {
                if(this.btnIcon) {
                    return '<i class="'+this.btnIcon+'"></i> '+this.btnText;
                } else {
                    return '';
                }
            }
        },
        methods: {
            doAction() {
                switch (this.actionMethod) {
                    case 'get':

                        break;
                    case 'post':

                        break;
                    case 'put':

                        break;
                    case 'delete':
                        axios.delete(this.actionUrl).then(res => {
                            // console.log(res);
                            if (res.data == 'deleted') {document.location.reload();}
                        });
                        break;

                    default:
                        break;
                }
            }
        }
    }
</script>
