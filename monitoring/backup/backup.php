<br>
<div class="monitor-titulo">
    <p class="title">Database backup using RMAN</p>
</div>

<!-- View content -->
<div style="width: 100%; margin-left: 15%; margin-top:5%; display: flex;">

    <!-- Hemisferio izquierdo -->
    <div style="width: 40%;">
        <div>
            <!-- Combobox con el tipo de backup que quiero hacer -->
            <label>Choose Data Base Backup</label>
            <select id="comboBackupObjetos" class="form-control" style="width: 60%; text-align: center;">
                <option value="Full Database Backup">Full Database Backup</option>
                <option value="Tablespaces">Tablespaces</option>
                <option value="Tablespaces">DataFiles</option> 
            </select>
        </div>

        <div style="margin-top:10%";>
            <label>Choose the Object</label>
            <select id="comboBackupTablespace" class="form-control" style="width: 60%; text-align: center;">
                <option value="SYSTEM01">SYSTEM</option>
                <option value="SYSAUX01">SYSAUX</option>
                <option value="USERS01">USERS</option>
                <option value="TEMP01">TEMP</option>
                <option value="UNDOTBS01">UNDO</option>
            </select>
        </div>

        

    </div>
    
    <!-- Hemisferio derecho -->
    <div style="width: 40%;">
        <div style="width: 59%; margin-top:4%;">
            <input type="text" id="archivedTextField" class="form-control bg-success" style="width: 60%; text-align: center; color:#FFF;" value="Archived" disabled/>
        </div>
        <div style="margin-top:2%">
            <input class="check-backup-include" id="checkBackupControlFiles" type="checkbox" value="Include Control Files">
            <label class="label-backup-include" for="checkBackupControFiles">Include Control Files</label>
        </div>
        <div style="margin-top:2%">
            <input class="check-backup-include" id="checkBackupRedoLogs" type="checkbox" value="Include Redo Logs">
            <label class="label-backup-include" for="checkBackupRedoLogs">Include Redo Logs</label>
        </div>
        <div style="margin-top:2%; margin-left: 0%;">
            <!-- Botón de aceptar -->
            <input class="btn btn-outline-light btn-lg px-5" id="buttonBackupAceptar" type="button" value="Confirm">
        </div>
    </div>
</div>


