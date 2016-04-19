<div class="container">
    <div class="row">
        <form role="form" method="post" enctype='multipart/form-data'>
            <div class="col-lg-6">
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>

                <div class="form-group">
                    <label for="InputEmail">Image</label>
                    <div class="input-group">
                        <input type="file" class="form-control" id="InputEmailSecond" name="image" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputName">Enter Name</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="name" id="InputName" placeholder="Enter Name" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputEmail">Desctiption</label>
                    <div class="input-group">
                        <textarea class="form-control" id="InputEmailFirst" name="description" placeholder="Enter Email" required></textarea>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                
                <input type="submit" id="submit" value="Submit" class="btn btn-info pull-right">
            </div>
        </form>
        
    </div>
</div>