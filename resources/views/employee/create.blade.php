@extends('layout.master')
@section('body')
    <section>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Create employee</h4>
                            </div>
                            <div class="col-md-6 mr-auto">
                                <a href="{{route('index')}}" class="btn btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="contactForm">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    aria-describedby="emailHelp" placeholder="Enter employee name">

                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <h4>Create employee</h4>
                        </div>
                        <div class="card-body">
                            <form id="listForm" class="pb-2">
                                <input type="text" id="listItem" class="form-fontrol" placeholder="Enter item">
                                <button type="button" onclick="addItem()">Add</button>
                            </form>

                            <ul id="itemList"></ul>

                        </div>
                    </div>
                </div>
                <script>
                    function addItem() {

                        var newItem = document.getElementById('listItem').value;


                        if (newItem.trim() !== '') {

                            var li = document.createElement('li');
                            li.appendChild(document.createTextNode(newItem));


                            document.getElementById('itemList').appendChild(li);


                            document.getElementById('listItem').value = '';
                        }
                    }
                </script>
            </div>
        </div>
    </section>



    <script>
        let contactForm = document.getElementById('contactForm');
        contactForm.addEventListener('submit', async (event) => {
            event.preventDefault();
            let name = document.getElementById('name').value;
            let skillList  = document.getElementsByTagName('li');
            let skills = [];
            for (let i = 0; i < skillList.length; i++) {
                skills.push(skillList[i].textContent.trim());
            }

            if (name.length == 00) {
                alert('insert your name')
            } else {
                let formData = {
                    name: name,
                    skills: skills
                }
                let url = "/employee";



                let result = await axios.post(url, formData);





                if (result.data.success == true) {
                    alert('success');
                    contactForm.reset();

                } else {
                    alert('error')
                }
            }

        });
    </script>
@endsection
