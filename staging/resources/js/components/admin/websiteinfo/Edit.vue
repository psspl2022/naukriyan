<template>
  <section class="content">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Update Website Info</li>
          </ol>
        </div>
      </div>
      <div class="row justify-content-around">
        <!-- left column -->
        <div class="col-md-11">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Update Website Info</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="post" @submit.prevent="addWebInfo()">
              <div class="card-body">
                <div class="form-group">
                  <label for="ReligionId">Select Website Content</label>
                  <select
                    class="form-control"
                    v-model="dropDownValue"
                    @change="getWebinfoData($event)"
                  >
                    <option value="">---Select One---</option>
                    <option value="about_us">About Us</option>
                    <option value="term_and_condition">
                      Terms and Conditions
                    </option>
                    <option value="privacy_policy">Privacy Policy</option>
                    <option value="advertise_with_us">Advertise with us</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="">Add Content</label>
                  <ckeditor
                    :editor="editor"
                    v-model="editorData"
                    :config="editorConfig"
                  ></ckeditor>
                </div>
              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
</template>

<script>
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
export default {
  name: "New",
  data() {
    return {
      web_id: this.$route.params.id,
      dropDownValue: '',
      editor: ClassicEditor,
      editorData: "",
      editorConfig: {
        // The configuration of the editor.
      }
    };
  },
  methods: {
    getWebinfoData(event) {
      let contentKey = event.target.value;
      axios
        .get("/get-webinfo-data", {
          params: {
            web_id: this.web_id,
            contentKey: contentKey,
          },
        })
        .then((response) => {
          if (response.status === 200) {
            if (response.data.data.about_us) {
              this.editorData = response.data.data.about_us;
            }

            if (response.data.data.terms_and_condition) {
              this.editorData = response.data.data.terms_and_condition;
            }

            if (response.data.data.privacy_policy) {
              this.editorData = response.data.data.privacy_policy;
            }

            if (response.data.data.advertise_with_us) {
              this.editorData = response.data.data.advertise_with_us;
            }
          } else {
            console.log("something went wrong.");
          }
        });
    },
    
    addWebInfo() {
      axios
        .post("/add-websiteinfo", {
          params: {
            web_id: this.web_id,
            dropDownValue: this.dropDownValue,
            editor_data: this.editorData,
          },
        })
        .then((response) => {
          if (response.data.status === true) {
            toast({
              type: "success",
              title: response.data.message,
            });
          } else {
            toast({
              type: "warning",
              title: response.data.message,
            });
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>

<style scoped>
</style>