<template>
  <div class="row stage-main-div">
    <div class="col-sm-12">

      <form class="popupForm" id="skills" role="form" method="post" @submit.prevent="addSkill()">
        <fieldset class="mb-2">
          <legend>Skills</legend>
          <div class="row ">
            <div class="col-sm-1"></div>
            <div class="col-sm-4">
              <div>
              <label class="col-form-label" for="">
                <span style="color: red"> * </span>Skill</label>
              <input type="hidden" v-for="i in i" :key="'skill' + i" v-model="form.index[i - 1]" />
              <input v-for="i in i" :key="'skill' + i" type="text" class="form-control mb-3" :name="'skill' + i"
                placeholder="Enter Skill" list="skill_list" v-model="form.skill[i - 1]" @keyup="
                  () => {
                    initItems(form.skill[i - 1]);
                  }
                " :add-on-key="[13, ',', ';']" :autocomplete-items="autocompleteItems" @tags-changed="update"
                :class="{ 'is-invalid': form.errors.has('skill') }" />
              <datalist id="skill_list" v-for="i in i" :key="'d' + i">
                <option v-for="skill in skill_list" :key="skill" :value="skill">{{ skill }}</option>
              </datalist>
              </div>
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-4">
              <label class="col-form-label" for="">
                <span style="color: red"> * </span>Expert Level</label>
              <select v-for="i in i" :key="'expert'.i" placeholder="Select Expert Level" class="form-control custom-select mb-3"
                :name="'expert_level' + i" v-model="form.expert_level[i - 1]" :class="{
                  'is-invalid': form.errors.has('expert_level'),
                }">
                <option value="" disabled>Select Expert Level</option>
                <option value="Beginner">Beginner</option>
                <option value="Moderate">Moderate</option>
                <option value="Expert">Expert</option>
              </select>
            </div>            
            <div class="col-sm-1">
              <div style="marginTop: 12rem; lineHeight: 3.5 ;">
                <div v-for="i in i" :key="'skill' + i">
                  <span title="Delete" style="cursor:pointer" v-on:click="deleteSkill(form.index[i - 1], i - 1)">
                    <!-- <i style="color: #f95602;" class="fa fa-trash font-18 "  v-if="i > 3"></i> -->
                    <i style="color: #f95602;" class="fa fa-times-circle font-20"  v-if="i > 3"></i>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-sm-1"></div>
          </div>
          <div class="row mt-0 mb-2" v-if="j == 1">
            <div class="col-sm-12 mt-0" v-if="j == 1">
              <label class="col-form-label" for="" v-if="j == 1">Add More Skill</label>
              <!-- <textarea
                v-if="j == 1"
                type="text"
                class="form-control"
                :name="more_skill"
                placeholder="Enter Additional Skill"
                v-model="more_skill"
                :class="{ 'is-invalid': form.errors.has('more_skill') }"
              ></textarea> -->

              <vue-tags-input 
              class="" 
              placeholder="Add Additional Skills" 
              list="skill_list"
              v-model="tag"
              :tags="tags"
              @tags-changed="newTags => tags = newTags"
              @keyup="
                () => {
                  placeholder = ' ';
                }
              " :add-on-key="[13, ',', ';']" :autocomplete-items="autocompleteItems"  />
                <datalist id="skill_list" v-for="i in i" :key="i">
                <option v-for="skill in skill_list" :key="skill" :value="skill">{{ skill }}</option>
              </datalist>
              <has-error :form="form" field="more_skill"></has-error>
            </div>
          </div>
          <!-- <span v-on:click="remove(form.index[i - 1], i - 1)" v-if="x > 1" class="btn btn-primary mt-3">
            Remove
          </span> -->
        </fieldset>
        <span v-if="j==0" v-on:click="addMore(j)" class="btn btn-primary mt-3">Add More</span>
        <span v-if="j==1"  class="btn btn-primary mt-3">Remove</span>
        <button type="submit" class="btn btn-primary mt-3">Save</button>
        <span v-on:click="updatepStage()" class="btn btn-primary mt-3">Skip</span>
      </form>
    </div>
  </div>
</template>

<script>
import $ from "jquery";
import VueTagsInput from "@johmun/vue-tags-input";
export default {
  name: "SkillstartStage",
  props: {
    startStage: { type: Function },
  },
  components: {
    VueTagsInput,
  },
  data() {
    return {
      i: 3,
      j: 0,
      x: 1,
      tag: '',
      tags: [],
      skill_list: [],
      handlers: [],
      autocompleteItems: [],
      form: new Form({
        id: "",
        index: [""],
        skill: [""],
        expert_level: ["", "", ""],
      }),
    };
  },
  watch: {
    i: "updatex",
  },
  created() {
    this.getAllSkill();
  },
  methods: {
    updatex() {
      this.x = this.i;
    },
    updatepStage() {
      let stage = 4;
      // console.log("hello");
      axios.get(`/skip-stage/${stage}`).then((response) => {
        this.startStage();
      });
    },

    addSkill() {
      if (
        this.form.skill.includes("") ||
        ((this.form.expert_level.length) < 4 && this.form.expert_level.includes(""))
      ) {
        swal("Please fill all mandatory fields");
      } else if(this.j == 1){
         if(this.tags.length > 0){
          this.tags.map((i) => {
            this.form.skill.push(i.text);
          });
          this.form.post("/add-skill-detail").then((response) => {
            this.updatepStage();
              toast({
              type: "success",
              title: "Skill Detail Added successfully",
            })
            // if(response.data.stage.stage == 6)
            // {
            //   window.location.href='/#/profileview';
            // }
            // else{
            //   toast({
            //   type: "success",
            //   title: "Skill Detail Added successfully",
            // });
            // }
          });
        } else{
          swal("Please fill all mandatory fields");
        }
      }else{
        this.form.post("/add-skill-detail").then((response) => {
          // console.log(response.data.stage.stage);
            this.updatepStage();
              toast({
              type: "success",
              title: "Skill Detail Added successfully",
            })
          });
      }
      
    },

    deleteSkill(i, index) {
      this.i = --this.i;
      this.form.skill.splice(index, 1);
      this.form.expert_level.splice(index, 1);
      this.form.index.splice(index, 1);

      if (i != "") {
        axios.get(`/delete-skill-detail/${i}`).then((response) => {});
      }
    },
    addMore(j) {
      this.j = ++j;
    },
    // remove(j) {
    //   this.j = --this.j;

    //   if (i != "") {
    //     axios.get(`/delete-skill-detail/${i}`).then((response) => { });
    //   }

    // },
    getAllSkill() {
      axios.get("/get-skill-detail").then((response) => {
        // console.log(response.data.length);
        const data = response.data;
        if (data.length > 0) {
          this.i = data.length;
          this.form.skill = [];
          this.form.expert_level = [];
          this.form.index = [];
          data.map((i, x) => {
            this.form.skill.push(i.skill);
            this.form.expert_level.push(i.expert_level);
            this.form.index.push(i.id);
          });
        }
      });
    },
    update(newTags) {
      this.autocompleteItems = [];
      this.tags = newTags.map((a) => {
        return a.text;
      });
      this.handlers = this.tags.toString();
      // this.keyword = this.tags.toString();
      // console.log(this.tags);
    },
    initItems(skill) {
      // console.log(skill)
      // if (this.skill.length < 2) return;
      const url = `get-allskills/` + skill;

      axios
        .get(url)
        .then((response) => {
          this.skill_list = response.data.data.map((a) => {
            return a.name;
          });
        })
      // console.log(this.skill_list)
    },
  },
};
</script>

<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap");


body {
  box-sizing: border-box;
  background: #f2f2f2;
  font-family: "Roboto", sans-serif;
  display: flex;
  align-items: center;
  justify-content: center;
}

.container {
  background: #fff;
  width: 100%;
  padding: 1rem;
}

.title {
  font-size: 24px;
  line-height: 28px;
  font-weight: bold;
  color: #374151;
  padding-bottom: 11px;
  border-bottom: 1px solid #d7dbdf;
}

.form-group {
  margin-top: 25px;
  display: flex;
  flex-direction: column;
}

.textarea-group label,
.form-group label {
  color: #374151;
  font-size: 16px;
  line-height: 19px;
  margin-bottom: 10px;
}

.form-group [type],
.textarea-group textarea {
  border: 1px solid #d2d6db;
  border-radius: 6px;
  padding: 15px;
}

.form-group [type]:hover,
.textarea-group textarea:hover {
  border-color: #a8afb9;
}

.form-group [type]:focus,
.textarea-group textarea:focus {
  border-color: #5850eb;
}

.textarea-group {
  margin-top: 24px;
}

.textarea-group textarea {
  resize: none;
  width: 100%;
  margin-top: 10px;
  height: calc(100% - 59px);
}

.checkbox-group {
  margin-top: 25px;
}

.checkbox-group label {
  display: flex;
}

.checkbox-group label::before {
  content: "\0020";
  display: flex;
  align-items: center;
  justify-content: center;
  width: 16px;
  height: 16px;
  margin-right: 8px;
  border: 1px solid #d2d6db;
  border-radius: 6px;
  transition: background 0.1s ease-in;
}

.checkbox-group input[type="checkbox"] {
  /* ici on ne doit pas mettre de display: none afin de pouvoir "tabber" */
  position: absolute;
  width: 1px;
  height: 1px;
  padding: 0;
  margin: -1px;
  overflow: hidden;
  clip: rect(0, 0, 0, 0);
  border: 0;
}

.checkbox-group input[type="checkbox"]:focus+label:before {
  border-color: #5850eb;
}

.checkbox-group input[type="checkbox"]:checked+label:before {
  color: #fff;
  content: "\2713";
  background: #5850eb;
  border-color: #5850eb;
}

.button {
  font-weight: bold;
  line-height: 19px;
  background: #5850eb;
  border: none;
  padding: 15px 25px;
  border-radius: 6px;
  color: white;
  width: 100%;
  margin-top: 24px;
}

.button:hover {
  background: #6e67ee;
}

.button:focus {
  background: #4239e8;
}

@media screen and (min-width: 768px) {
  body {
    align-items: center;
    justify-content: center;
  }

  .container {
    margin: 2rem;
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.1);
    border-radius: 4px;
    max-width: 32rem;
    padding: 2rem;
  }
}

@media screen and (min-width: 1024px) {
  .container {
    max-width: 80%;
    width: 100%;
  }

  .checkboxes {
    display: flex;
  }

  .checkboxes> :not(:first-child) {
    margin-left: 1rem;
  }

  .grid {
    display: grid;
    grid-gap: 24px;
    grid-template-columns: 1fr 1fr 1fr;
    grid-auto-rows: 1fr;
  }

  .email-group {
    grid-column: 1;
    grid-row: 2;
  }

  .phone-group {
    grid-column: 2;
    grid-row: 2;
  }

  .textarea-group {
    grid-column: 3;
    grid-row: span 2;
    margin-right: 2rem;
  }

  .button-container {
    text-align: right;
  }

  .button {
    /* bon, bon, bon
		c'est pas tout mais j'ai faim moi ^^
		*/
    width: auto;
  }
}
</style>
