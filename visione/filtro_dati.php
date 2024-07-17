<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtri</title>
    <?php include "./inc/links.php"; ?>
    <script type="text/javascript" src="./js/jquery.min.js"></script>

    <?php include "./inc/navbar.php"; ?>
    <link rel="stylesheet" href="./css/filtro_dati.css">
<style>
    .badge{
        background-color: #27dd5d9c;
        color: #080606;
    }
    .fw-bold{
       transition: all 0.3s;
    }
    .fw-bold:hover{
        transform: scale(1.2);
    }
</style>
</head>

<body>

    <div class="panel-heading mx-auto">

        <main>
            <h1 class="text-center mt-3 mb-3">Filtro Globale</h1>

            <div class="row">

                <div class="col-sm-2 p-3 bg-light">

                    <button type="button" name="clear_filter" class="btn btn-warning btn-sm form-control mb-2" id="clear_filter">Clear Filter</button>

                    <div class="multiselect">
                        <div class="selectBox" onclick="showCheckboxes()">
                            <select>
                                <option>
                                    <p class="fs-4 text-center border-bottom text-bold">Territorio</p>
                                </option>
                            </select>
                            <div class="overSelect"></div>
                        </div>
                        <div id="checkboxes">
                            <div id="territorio" class="mb-2"></div>
                        </div>
                    </div>

                    <div class="multiselect">
                        <div class="selectBox1" onclick="showCheckboxes1()">
                            <select>
                                <option>
                                    <p class="fs-4 text-center border-bottom text-bold">Modalità di volo</p>
                                </option>
                            </select>
                            <div class="overSelect"></div>
                        </div>
                        <div id="checkboxes1">
                            <div id="volo_filter" class="mb-2"></div>
                        </div>
                    </div>

                    <div class="multiselect">
                        <div class="selectBox2" onclick="showCheckboxes2()">
                            <select>
                                <option>
                                    <p class="fs-4 text-center border-bottom text-bold">Mansione a bordo</p>
                                </option>
                            </select>
                            <div class="overSelect"></div>
                        </div>
                        <div id="checkboxes2">
                            <div id="qualifiche_filter" class="mb-2"></div>
                        </div>
                    </div>

                    <div class="multiselect">
                        <div class="selectBox13" onclick="showCheckboxes13()">
                            <select>
                                <option>
                                    <p class="fs-4 text-center border-bottom text-bold">C.D.A.</p>
                                </option>
                            </select>
                            <div class="overSelect"></div>
                        </div>
                        <div id="checkboxes13">
                            <div id="qualifiche_cda" class="mb-2"></div>
                        </div>
                    </div>

                    <div class="multiselect">
                        <div class="selectBox14" onclick="showCheckboxes14()">
                            <select>
                                <option>
                                    <p class="fs-4 text-center border-bottom text-bold">P.A.</p>
                                </option>
                            </select>
                            <div class="overSelect"></div>
                        </div>
                        <div id="checkboxes14">
                            <div id="qualifiche_pa" class="mb-2"></div>
                        </div>
                    </div>

                    <div class="multiselect">
                        <div class="selectBox10" onclick="showCheckboxes10()">
                            <select>
                                <option>
                                    <p class="fs-4 text-center border-bottom text-bold">Qualifiche</p>
                                </option>
                            </select>
                            <div class="overSelect"></div>
                        </div>
                        <div id="checkboxes10">
                                                            <!-- -->
                        <div class="multiselect">
                        <div class="selectBox38" onclick="showCheckboxes38()">
                            <select>
                                <option>
                                    <p class="fs-4 text-center border-bottom text-bold">Qualifiche Impiego</p>
                                </option>
                            </select>
                            <div class="overSelect"></div>
                        </div>
                        <div id="checkboxes38">

                            <div class="multiselect">
                                    <div class="selectBox15" onclick="showCheckboxes15()">
                                        <select>
                                            <option>
                                                <p class="fs-4 text-center border-bottom text-bold">Elirec a1</p>
                                            </option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes15">
                                        <div id="qualifiche_elirec_a1" class="mb-2"></div>
                                    </div>
                                </div>

                                <div class="multiselect">
                                    <div class="selectBox16" onclick="showCheckboxes16()">
                                        <select>
                                            <option>
                                                <p class="fs-4 text-center border-bottom text-bold">Elirec b1</p>
                                            </option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes16">
                                        <div id="qualifiche_elirec_b1" class="mb-2"></div>
                                    </div>
                                </div>

                                <div class="multiselect">
                                    <div class="selectBox42" onclick="showCheckboxes42()">
                                        <select>
                                            <option>
                                                <p class="fs-4 text-center border-bottom text-bold">Elirec a2</p>
                                            </option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes42">
                                        <div id="qualifiche_elirec_a2" class="mb-2"></div>
                                    </div>
                                </div>

                                <div class="multiselect">
                                    <div class="selectBox43" onclick="showCheckboxes43()">
                                        <select>
                                            <option>
                                                <p class="fs-4 text-center border-bottom text-bold">Elirec b2</p>
                                            </option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes43">
                                        <div id="qualifiche_elirec_b2" class="mb-2"></div>
                                    </div>
                                </div>

                                <div class="multiselect">
                                    <div class="selectBox17" onclick="showCheckboxes17()">
                                        <select>
                                            <option>
                                                <p class="fs-4 text-center border-bottom text-bold">T.</p>
                                            </option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes17">
                                        <div id="qualifiche_t" class="mb-2"></div>
                                    </div>
                                </div>

                                <div class="multiselect">
                                    <div class="selectBox7" onclick="showCheckboxes7()">
                                        <select>
                                            <option>
                                                <p class="fs-4 text-center border-bottom text-bold">T.O.B</p>
                                            </option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes7">
                                        <div id="qualifiche_tob" class="mb-2"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                                             <!-- -->

                        <div class="multiselect">
                        <div class="selectBox39" onclick="showCheckboxes39()">
                            <select>
                                <option>
                                    <p class="fs-4 text-center border-bottom text-bold">Qual. Ist. e Controllo</p>
                                </option>
                            </select>
                            <div class="overSelect"></div>
                        </div>
                        <div id="checkboxes39">

                                <div class="multiselect">
                                    <div class="selectBox8" onclick="showCheckboxes8()">
                                        <select>
                                            <option>
                                                <p class="fs-4 text-center border-bottom text-bold">P.C</p>
                                            </option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes8">
                                        <div id="qualifiche_pc" class="mb-2"></div>
                                    </div>
                                </div>

                                <div class="multiselect">
                                    <div class="selectBox9" onclick="showCheckboxes9()">
                                        <select>
                                            <option>
                                                <p class="fs-4 text-center border-bottom text-bold">I.P.</p>
                                            </option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes9">
                                        <div id="qualifiche_p_i" class="mb-2"></div>
                                    </div>
                                </div>

                                <div class="multiselect">
                                    <div class="selectBox11" onclick="showCheckboxes11()">
                                        <select>
                                            <option>
                                                <p class="fs-4 text-center border-bottom text-bold">P.E.S.</p>
                                            </option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes11">
                                        <div id="qualifiche_pes" class="mb-2"></div>
                                    </div>
                                </div>

                                <div class="multiselect">
                                    <div class="selectBox18" onclick="showCheckboxes18()">
                                        <select>
                                            <option>
                                                <p class="fs-4 text-center border-bottom text-bold">T.I.</p>
                                            </option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes18">
                                        <div id="qualifiche_ti" class="mb-2"></div>
                                    </div>
                                </div>

                                <div class="multiselect">
                                    <div class="selectBox19" onclick="showCheckboxes19()">
                                        <select>
                                            <option>
                                                <p class="fs-4 text-center border-bottom text-bold">E.T.P.</p>
                                            </option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes19">
                                        <div id="qualifiche_etp" class="mb-2"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                                                <!-- -->
                        <div class="multiselect">
                        <div class="selectBox40" onclick="showCheckboxes40()">
                            <select>
                                <option>
                                    <p class="fs-4 text-center border-bottom text-bold">Qual.Tecniche</p>
                                </option>
                            </select>
                            <div class="overSelect"></div>
                        </div>
                        <div id="checkboxes40">

                                <div class="multiselect">
                                    <div class="selectBox12" onclick="showCheckboxes12()">
                                        <select>
                                            <option>
                                                <p class="fs-4 text-center border-bottom text-bold">P.I.D.</p>
                                            </option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes12">
                                        <div id="qualifiche_pid" class="mb-2"></div>
                                    </div>
                                </div>


                                
                                <div class="multiselect">
                                    <div class="selectBox20" onclick="showCheckboxes20()">
                                        <select>
                                            <option>
                                                <p class="fs-4 text-center border-bottom text-bold">T.P.</p>
                                            </option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes20">
                                        <div id="qualifiche_tp" class="mb-2"></div>
                                    </div>
                                </div>

                                <div class="multiselect">
                                    <div class="selectBox21" onclick="showCheckboxes21()">
                                        <select>
                                            <option>
                                                <p class="fs-4 text-center border-bottom text-bold">P.C.P.</p>
                                            </option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes21">
                                        <div id="qualifiche_pcp" class="mb-2"></div>
                                    </div>
                                </div>

                                <div class="multiselect">
                                    <div class="selectBox22" onclick="showCheckboxes22()">
                                        <select>
                                            <option>
                                                <p class="fs-4 text-center border-bottom text-bold">P.C.S.</p>
                                            </option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes22">
                                        <div id="qualifiche_pcs" class="mb-2"></div>
                                    </div>
                                </div>

                                <div class="multiselect">
                                    <div class="selectBox23" onclick="showCheckboxes23()">
                                        <select>
                                            <option>
                                                <p class="fs-4 text-center border-bottom text-bold">S.S.A.1</p>
                                            </option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes23">
                                        <div id="qualifiche_ssa1" class="mb-2"></div>
                                    </div>
                                </div>

                                <div class="multiselect">
                                    <div class="selectBox48" onclick="showCheckboxes48()">
                                        <select>
                                            <option>
                                                <p class="fs-4 text-center border-bottom text-bold">S.S.A.2</p>
                                            </option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes48">
                                        <div id="qualifiche_ssa2" class="mb-2"></div>
                                    </div>
                                </div>

                                <div class="multiselect">
                                    <div class="selectBox24" onclick="showCheckboxes24()">
                                        <select>
                                            <option>
                                                <p class="fs-4 text-center border-bottom text-bold">T.C.S.</p>
                                            </option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes24">
                                        <div id="qualifiche_tcs" class="mb-2"></div>
                                    </div>
                                </div>
                            </div>
                            </div>  
                                            <!-- -->

                                            <div class="multiselect">
                        <div class="selectBox41" onclick="showCheckboxes41()">
                            <select>
                                <option>
                                    <p class="fs-4 text-center border-bottom text-bold">Capacità Aggiuntive</p>
                                </option>
                            </select>
                            <div class="overSelect"></div>
                        </div>
                        <div id="checkboxes41">

                                    <div class="multiselect">
                                    <div class="selectBox25" onclick="showCheckboxes25()">
                                        <select>
                                            <option>
                                                <p class="fs-4 text-center border-bottom text-bold">Y.</p>
                                            </option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes25">
                                        <div id="qualifiche_y" class="mb-2"></div>
                                    </div>
                                </div>

                                <div class="multiselect">
                                    <div class="selectBox26" onclick="showCheckboxes26()">
                                        <select>
                                            <option>
                                                <p class="fs-4 text-center border-bottom text-bold">G.1</p>
                                            </option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes26">
                                        <div id="qualifiche_g1" class="mb-2"></div>
                                    </div>
                                </div>

                                <div class="multiselect">
                                    <div class="selectBox44" onclick="showCheckboxes44()">
                                        <select>
                                            <option>
                                                <p class="fs-4 text-center border-bottom text-bold">G.2</p>
                                            </option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes44">
                                        <div id="qualifiche_g2" class="mb-2"></div>
                                    </div>
                                </div>

                                <div class="multiselect">
                                    <div class="selectBox45" onclick="showCheckboxes45()">
                                        <select>
                                            <option>
                                                <p class="fs-4 text-center border-bottom text-bold">G.3</p>
                                            </option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes45">
                                        <div id="qualifiche_g3" class="mb-2"></div>
                                    </div>
                                </div>

                                <div class="multiselect">
                                    <div class="selectBox27" onclick="showCheckboxes27()">
                                        <select>
                                            <option>
                                                <p class="fs-4 text-center border-bottom text-bold">H.</p>
                                            </option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes27">
                                        <div id="qualifiche_h" class="mb-2"></div>
                                    </div>
                                </div>

                                <div class="multiselect">
                                    <div class="selectBox28" onclick="showCheckboxes28()">
                                        <select>
                                            <option>
                                                <p class="fs-4 text-center border-bottom text-bold">F.1</p>
                                            </option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes28">
                                        <div id="qualifiche_f1" class="mb-2"></div>
                                    </div>
                                </div>

                                <div class="multiselect">
                                    <div class="selectBox46" onclick="showCheckboxes46()">
                                        <select>
                                            <option>
                                                <p class="fs-4 text-center border-bottom text-bold">F.2</p>
                                            </option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes46">
                                        <div id="qualifiche_f2" class="mb-2"></div>
                                    </div>
                                </div>

                                <div class="multiselect">
                                    <div class="selectBox47" onclick="showCheckboxes47()">
                                        <select>
                                            <option>
                                                <p class="fs-4 text-center border-bottom text-bold">F.3</p>
                                            </option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes47">
                                        <div id="qualifiche_f3" class="mb-2"></div>
                                    </div>
                                </div>

                                <div class="multiselect">
                                    <div class="selectBox29" onclick="showCheckboxes29()">
                                        <select>
                                            <option>
                                                <p class="fs-4 text-center border-bottom text-bold">I.</p>
                                            </option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes29">
                                        <div id="qualifiche_i" class="mb-2"></div>
                                    </div>
                                </div>

                                <div class="multiselect">
                                    <div class="selectBox30" onclick="showCheckboxes30()">
                                        <select>
                                            <option>
                                                <p class="fs-4 text-center border-bottom text-bold">C.1</p>
                                            </option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes30">
                                        <div id="qualifiche_c1" class="mb-2"></div>
                                    </div>
                                </div>

                                <div class="multiselect">
                                    <div class="selectBox49" onclick="showCheckboxes49()">
                                        <select>
                                            <option>
                                                <p class="fs-4 text-center border-bottom text-bold">C.2</p>
                                            </option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes49">
                                        <div id="qualifiche_c2" class="mb-2"></div>
                                    </div>
                                </div>

                                <div class="multiselect">
                                    <div class="selectBox31" onclick="showCheckboxes31()">
                                        <select>
                                            <option>
                                                <p class="fs-4 text-center border-bottom text-bold">B.1</p>
                                            </option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes31">
                                        <div id="qualifiche_b1" class="mb-2"></div>
                                    </div>
                                </div>

                                <div class="multiselect">
                                    <div class="selectBox50" onclick="showCheckboxes50()">
                                        <select>
                                            <option>
                                                <p class="fs-4 text-center border-bottom text-bold">B.2</p>
                                            </option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes50">
                                        <div id="qualifiche_b2" class="mb-2"></div>
                                    </div>
                                </div>

                                <div class="multiselect">
                                    <div class="selectBox32" onclick="showCheckboxes32()">
                                        <select>
                                            <option>
                                                <p class="fs-4 text-center border-bottom text-bold">V.1</p>
                                            </option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes32">
                                        <div id="qualifiche_v1" class="mb-2"></div>
                                    </div>
                                </div>

                                <div class="multiselect">
                                    <div class="selectBox51" onclick="showCheckboxes51()">
                                        <select>
                                            <option>
                                                <p class="fs-4 text-center border-bottom text-bold">V.2</p>
                                            </option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes51">
                                        <div id="qualifiche_v2" class="mb-2"></div>
                                    </div>
                                </div>

                                <div class="multiselect">
                                    <div class="selectBox33" onclick="showCheckboxes33()">
                                        <select>
                                            <option>
                                                <p class="fs-4 text-center border-bottom text-bold">M.</p>
                                            </option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes33">
                                        <div id="qualifiche_m" class="mb-2"></div>
                                    </div>
                                </div>

                                <div class="multiselect">
                                    <div class="selectBox34" onclick="showCheckboxes34()">
                                        <select>
                                            <option>
                                                <p class="fs-4 text-center border-bottom text-bold">A.1</p>
                                            </option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes34">
                                        <div id="qualifiche_a1" class="mb-2"></div>
                                    </div>
                                </div>

                                <div class="multiselect">
                                    <div class="selectBox52" onclick="showCheckboxes52()">
                                        <select>
                                            <option>
                                                <p class="fs-4 text-center border-bottom text-bold">A.2</p>
                                            </option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes52">
                                        <div id="qualifiche_a2" class="mb-2"></div>
                                    </div>
                                </div>

                                <div class="multiselect">
                                    <div class="selectBox35" onclick="showCheckboxes35()">
                                        <select>
                                            <option>
                                                <p class="fs-4 text-center border-bottom text-bold">L.1</p>
                                            </option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes35">
                                        <div id="qualifiche_l1" class="mb-2"></div>
                                    </div>
                                </div>

                                <div class="multiselect">
                                    <div class="selectBox53" onclick="showCheckboxes53()">
                                        <select>
                                            <option>
                                                <p class="fs-4 text-center border-bottom text-bold">L.2</p>
                                            </option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes53">
                                        <div id="qualifiche_l2" class="mb-2"></div>
                                    </div>
                                </div>

                                <div class="multiselect">
                                    <div class="selectBox36" onclick="showCheckboxes36()">
                                        <select>
                                            <option>
                                                <p class="fs-4 text-center border-bottom text-bold">R.D.R.1</p>
                                            </option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes36">
                                        <div id="qualifiche_rdr1" class="mb-2"></div>
                                    </div>
                                </div>

                                <div class="multiselect">
                                    <div class="selectBox54" onclick="showCheckboxes54()">
                                        <select>
                                            <option>
                                                <p class="fs-4 text-center border-bottom text-bold">R.D.R.2</p>
                                            </option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes54">
                                        <div id="qualifiche_rdr2" class="mb-2"></div>
                                    </div>
                                </div>

                                <div class="multiselect">
                                    <div class="selectBox37" onclick="showCheckboxes37()">
                                        <select>
                                            <option>
                                                <p class="fs-4 text-center border-bottom text-bold">A.P.</p>
                                            </option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes37">
                                        <div id="qualifiche_ap" class="mb-2"></div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <!--  -->

                        </div>
                    </div>

                    <div class="multiselect">
                        <div class="selectBox3" onclick="showCheckboxes3()">
                            <select>
                                <option>
                                    <p class="fs-4 text-center border-bottom text-bold">Utente</p>
                                </option>
                            </select>
                            <div class="overSelect"></div>
                        </div>
                        <div id="checkboxes3">
                            <div id="utente" class="mb-2"></div>
                        </div>
                    </div>

                    <div class="multiselect">
                        <div class="selectBox4" onclick="showCheckboxes4()">
                            <select>
                                <option>
                                    <p class="fs-4 text-center border-bottom text-bold">Teil Number</p>
                                </option>
                            </select>
                            <div class="overSelect"></div>
                        </div>
                        <div id="checkboxes4">
                            <div id="teil" class="mb-2"></div>
                        </div>
                    </div>

                    <div class="multiselect">
                        <div class="selectBox5" onclick="showCheckboxes5()">
                            <select>
                                <option>
                                    <p class="fs-4 text-center border-bottom text-bold">Data volo</p>
                                </option>
                            </select>
                            <div class="overSelect"></div>
                        </div>
                        <div id="checkboxes5">
                            <div id="data_volo" class="mb-2"></div>
                        </div>
                    </div>

                    <div class="multiselect">
                        <div class="selectBox6" onclick="showCheckboxes6()">
                            <select>
                                <option>
                                    <p class="fs-4 text-center border-bottom text-bold">Anno</p>
                                </option>
                            </select>
                            <div class="overSelect"></div>
                        </div>
                        <div id="checkboxes6">
                            <div id="anno" class="mb-2"></div>
                        </div>
                    </div>

                    <!-- <div id="qualifiche_filter" class="overflow-auto mb-3" style="height:350px;"></div> -->

                </div>

                <div class="col-sm-8">

                    <div class="d-flex flex-row mb-3">
                        <button type="button" class="btn btn-primary p-2 bd-hilight" id="search_button">Search</button>
                        <input type="text" class="bd-hilight" id="search_textbox" placeholder="Ricerca" aria-label="Ricerca" aria-describedby="search_button" />
                    </div>

                    <div id="filter_area" style="width:100%"></div>

                    <div id="skeleton_area"></div>

                    <div id="pagination_area" class="mt-2 mb-5"></div>
                </div>

                <!-- Grafici -->
                <div id="graf" class="box box-primary" style="width:40%;  height:30%; margin:50px; float:left">
                    <div class="box-header">
                        <div class="box-header" style="background-color:lightgrey">
                            <!-- tools box -->
                            <div class="pull-right box-tools">
                                <button class="btn btn-primary btn-sm" id="chiudi" title="Chiudi"><i class="fa fa-minus"></i></button>
                                <button class="btn btn-primary btn-sm" id="rimuovi" title="Rimuovi"><i class="fa fa-times"></i></button>
                            </div><!-- /. tools -->
                            <i class="fa fa-bar-chart"></i>
                            <h3 class="box-title">Test</h3>

                        </div><!-- /.box-header -->
                        <div class="box-body no-padding" id="box">
                            <canvas style="background-color:lightgrey" class="graf" id="cvChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Grafici -->
                <div id="graf1" class="box box-primary" style="width:40%;  height:30%; margin:50px; float:left">
                    <div class="box-header">
                        <div class="box-header" style="background-color:lightgrey">
                            <!-- tools box -->
                            <div class="pull-right box-tools">
                                <button class="btn btn-primary btn-sm" id="chiudi" title="Chiudi"><i class="fa fa-minus"></i></button>
                                <button class="btn btn-primary btn-sm" id="rimuovi1" title="Rimuovi"><i class="fa fa-times"></i></button>
                            </div><!-- /. tools -->
                            <i class="fa fa-line-chart"></i>
                            <h3 class="box-title">Test1</h3>

                        </div><!-- /.box-header -->
                        <div class="box-body no-padding" id="box1">
                            <canvas style="background-color:lightgrey" class="graf" id="cvChart1"></canvas>
                            <div class="form-group">
                                <label style="width:180px" class="col-sm-2 control-label">Inizio :</label>
                                <label class="col-sm-2 control-label">Fine :</label>
                                <div class="col-sm-10">
                                    <div class='input-group'>
                                        <input style="width:180px; float:left ; background:lightgrey; border:solid" id="start" type="date" class="form-control" /><input style="width:180px ; float:left; background:lightgrey; border:solid" id="end" type="date" class="form-control" /> <br><br>
                                        <button id="btn1" class="btn-info">Filtra <i class="fa fa-filter"></i></button> &nbsp;&nbsp;&nbsp;<button class="btn-info" id="btn2">Pulisci <i class="fa fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Grafici -->
                <div id="graf2" class="box box-primary" style="width:40%;  height:30%; margin:50px; float:left">
                    <div class="box-header">
                        <div class="box-header" style="background-color:lightgrey">
                            <!-- tools box -->
                            <div class="pull-right box-tools">
                                <button class="btn btn-primary btn-sm" id="chiudi" title="Chiudi"><i class="fa fa-minus"></i></button>
                                <button class="btn btn-primary btn-sm" id="rimuovi2" title="Rimuovi"><i class="fa fa-times"></i></button>
                            </div><!-- /. tools -->
                            <i class="fa fa-line-chart"></i>
                            <h3 class="box-title">Test2</h3>

                        </div><!-- /.box-header -->
                        <div class="box-body no-padding" id="box2">
                            <canvas style="background-color:lightgrey" class="graf" id="cvChart2"></canvas>
                        </div>
                    </div>
                </div>

            </div>

        </main>

    </div>

</body>
<?php include './inc/footer.php'; ?>
<script type="text/javascript" src="./js/filtro_dati.js"></script>
</html>

<script>


    function $(selector) {

        return document.querySelector(selector);

    }

    load_product(1);

    function load_product(page = 1, query = '') {

        $('#filter_area').style.display = 'none';

        $('#skeleton_area').style.display = 'block';

        $('#skeleton_area').innerHTML = make_skeleton();

        fetch('./process/process.php?page=' + page + query + '').then(function(response) {

            return response.json();

        }).then(function(responseData) {

            var html = '';

            if (responseData.data) {

                if (responseData.data.length > 0) {
                    html += '<p class="h1">' + responseData.total_data + ' Record trovati</p>';

                    html += '<table  class="table-responsive"  cellspacing="0" style="margin-left:0px; border:double" width="100%">';

                    html += '<thead>';

                    html += '<tr><th class="text-center">REPARTO</th>';

                    html += '<th class="text-center">UTENTE</th>';

                    html += '<th class="text-center">TEIL NUMBER</th>';

                    html += '<th class="text-center">MANSIONE</th>';

                    html += `<th class="text-center">MODALITA'</th>`;

                    html += '<th class="text-center">DATA VOLO</th>';

                    html += '<th class="text-center">IMPIEGATO IN</th>';

                    html += '<th class="text-center">TEMPOVOLO</th>';

                    html += '<th class="text-center">ANNO</th>';

                    html += '<th class="text-center">NOTE</th></tr>';

                    html += '</thead>';

                    for (var i = 0; i < responseData.data.length; i++) {

                        html += '<tr>';

                        html += '<td class="text-center td_table"><p>' + responseData.data[i].reparto +'<span class="badge bg-info text-dark"></td>';

                        html += '<td class="text-center td_table"><p>' + responseData.data[i].grado + '&nbsp;&nbsp;' + responseData.data[i].cognome + '&nbsp;&nbsp;&nbsp;<span class="badge bg-info text-dark"></td>';

                        html += '<td class="text-center td_table"><p><span class="badge bg-info text-dark">' + responseData.data[i].targa + '</span><br /></td>';

                        html += '<td class="text-center td_table"><span class="fw-bold text-danger"> ' + responseData.data[i].mansionebordo + '</span></td>';

                        html += '<td class="text-center td_table"><p>' + responseData.data[i].condizioni + '&nbsp;&nbsp;&nbsp;<span class="badge bg-info text-dark"></td>';

                        html += '<td class="text-center td_table"><p><span class="badge bg-info text-dark">' + responseData.data[i].datavolo + '</span><br /></td>';

                        html += '<td class="text-center td_table"><span class="fw-bold text-danger"> ' + responseData.data[i].nazest + '</span></td>';

                        html += '<td class="text-center td_table"><p><span class="badge bg-info text-dark">' + responseData.data[i].durata_volo + '</span><br /></td>';

                        html += '<td class="text-center td_table"><span class="fw-bold text-danger"> ' + responseData.data[i].anno + '</span></td>';

                        html += '<td class="text-center td_table"><span id="ingrandimento" class="fw-bold text-danger"> ' + responseData.data[i].note + '</span></td>';

                        html += '</tr>';

                    }

                    html += '</table>';

                    $('#filter_area').innerHTML = html;

                } else {
                    $('#filter_area').innerHTML = '<p class="h6">Nessun record trovato</p>';
                }

            }

            if (responseData.pagination) {
                $('#pagination_area').innerHTML = responseData.pagination;
            }

            setTimeout(function() {

                $('#filter_area').style.display = 'block';

                $('#skeleton_area').style.display = 'none';

            }, 500);

        });

        //grafico a barre

        async function getdata() {
            const colors = {}; 
            const response = await fetch('./process/process.php?page=' + page + query + '');
            const data = await response.json();

            const results = Object.values(data.data.reduce((accumulator, activity) => {
                        const cognome = activity.cognome;
                        const condizioni = activity.condizioni;
                        const durata_volo = activity.durata_volo;

                        const key = `${cognome}_${condizioni}`;

                        if (!accumulator[key]) {
                            // Generate a random color only once for each unique "condizioni" value
                            const color = getRandomColor(condizioni);

                            accumulator[key] = {
                                name: cognome,
                                activities: [{
                                    name: condizioni,
                                    duration: durata_volo,
                                    color: color,
                                }],
                            };
                        } else {
                            // Use the same color for activities with the same "condizioni" value
                            const existingActivity = accumulator[key].activities.find(a => a.name === condizioni);
                            if (existingActivity) {
                                const [currHours, currMinutes, currSeconds] = existingActivity.duration.split(':');
                                const [newHours, newMinutes, newSeconds] = durata_volo.split(':');

                                const totalSeconds = parseInt(currSeconds) + parseInt(newSeconds);
                                const seconds = totalSeconds % 60;
                                const carryMinutes = Math.floor(totalSeconds / 60);

                                const totalMinutes = parseInt(currMinutes) + parseInt(newMinutes) + carryMinutes;
                                const minutes = totalMinutes % 60;
                                const carryHours = Math.floor(totalMinutes / 60);

                                const hours = parseInt(currHours) + parseInt(newHours) + carryHours;

                                existingActivity.duration = `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
                            } else {
                                accumulator[key].activities.push({
                                    name: condizioni,
                                    duration: durata_volo,
                                });
                            }
                        }

                        return accumulator;
                    }, {}));



            window.myChart?.destroy();

            const ctx = document.getElementById("cvChart").getContext("2d");
             
            const labels = Object.values(results).map((person) => person.name);
                    const datasets = [];
                    const backgroundColor = [];
                    Object.entries(results).forEach(([person, data]) => {
                        data.activities.forEach((activity, index) => {
                            const dataset = datasets[index];
                            const [hours, minutes, seconds] = activity.duration.split(':');
                            const durationInMinutes = parseInt(hours) * 60 + parseInt(minutes);
                            backgroundColor.push(colors[activity.name]);


                        if (!dataset) {
                            datasets.push({
                                label: [activity.name],
                                data: [durationInMinutes],
                                backgroundColor: backgroundColor,
                                borderColor: activity.color,
                                borderWidth: 1,
                            });
                        } else {
                            dataset.label.push(activity.name);
                            dataset.data.push(durationInMinutes);
                        }
                    });
                });

                    function getRandomColor(condizioni) {
                        const letters = '0123456789ABCDEF';
                       

                        let color = '#';
                        for (let i = 0; i < 6; i++) {
                            color += letters[Math.floor(Math.random() * 16)];
                        }

                        colors[condizioni] = color;

                        return colors[condizioni];
                    }

                    window.myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: datasets,
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    display: false,
                                },
                                title: {
                                    display: true,
                                    text: 'Activities by Person',
                                },
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            const datasetIndex = context.datasetIndex;
                                            const dataIndex = context.dataIndex;
                                            const duration = datasets[datasetIndex].data[dataIndex];
                                            const hours = Math.floor(duration / 60);
                                            const minutes = duration % 60;
                                            const conditions = datasets[datasetIndex].label[dataIndex];
                                            return `${conditions}: ${hours}h ${minutes}m`;
                                        }
                                    }
                                }
                            },
                            scales: {
                                x: {
                                    title: {
                                        display: true,
                                        text: 'Person',
                                    },
                                },
                                y: {
                                    beginAtZero: true,
                                    title: {
                                        display: true,
                                        text: 'Duration (minutes)',
                                    },
                                    ticks: {
                                        callback: function(value) {
                                            const hours = Math.floor(value / 60);
                                            const minutes = value % 60;
                                            return `${hours}h ${minutes}m`;
                                        },
                                    },
                                },
                            },
                        },
                    });

        }
        getdata();
        //grafico a linee

        async function getdata1() {

const response1 = await fetch('./process/process.php?page=' + page + query + '');
const data = await response1.json()
let length1 = data.data.length;
let cognomi = {};
let map = data.data.map(mappa => mappa);
let labels1 = [];
let values1 = [];

for (let i = 0; i < length1; i++) {
    const datavolo = data.data[i].datavolo;
    const mesevolo = data.data[i].mesevolo;
    const cognome = data.data[i].cognome;

    labels1.push(datavolo);
    values1.push(mesevolo);

    if (!cognomi[cognome]) {
        cognomi[cognome] = [];
    }
    cognomi[cognome].push(mesevolo);
}

cognomi = Object.keys(cognomi);

const convertdate = labels1.map(date => new Date(date).setHours(0, 0, 0, 0));

if (window.myChart1 !== undefined)
    window.myChart1.destroy();

let btn1 = document.querySelector('#btn1');
let btn2 = document.querySelector('#btn2');

const extract = [];

function filtra(selectedYear) {
    const start1 = new Date(document.getElementById("start").value);
    const startYear = start1.getFullYear();
    const start = start1.setHours(0, 0, 0, 0);

    const end1 = new Date(document.getElementById("end").value);
    const end = end1.setHours(0, 0, 0, 0);
    const filterdates = convertdate.filter(date => date >= start && date <= end);

    extract.length = 0; // Clear the extract array

    filterdates.forEach(secs => {
        const arrOfDates = filterdates.map(secs => new Date(secs).toString());
        let msec = Date.parse(arrOfDates[w]);
        const d = new Date(msec);
        const convert = d.getFullYear() + '-' + ((d.getMonth() > 8) ? (d.getMonth() + 1) : ('0' + (d.getMonth() + 1))) + '-' + ((d.getDate() > 9) ? d.getDate() : ('0' + d.getDate()));
        extract.push(map.find(person => person.datavolo === convert).cognome);
    });

    myChart1.data.labels = extract;

    const startArray = convertdate.indexOf(filterdates[0]);
    const endArray = convertdate.indexOf(filterdates[filterdates.length - 1]);

    const copydatapoints = labels1.slice(startArray, endArray + 1);

    myChart1.data.datasets[0].data = copydatapoints;
    myChart1.data.datasets[1].data = values1;
    minYear = startYear - 1;
    maxYear = startYear + 1;

    myChart1.options.scales.y.min = `${minYear}-01-01T00:00:00`;
    myChart1.options.scales.y.max = `${maxYear}-01-01T00:00:00`;
    myChart1.update();
}

function reset() {
    myChart1.data.labels = cognomi;
    myChart1.data.datasets[0].data = convertdate;
    myChart1.data.datasets[1].data = values1;
    myChart1.update();
}

let minYear;
let maxYear;

btn1.addEventListener('click', () => {
    filtra();
});

btn2.addEventListener('click', () => {
    reset();
});

const ctx1 = document.getElementById("cvChart1").getContext("2d");

const selectedYear = new Date().getFullYear();
if (selectedYear !== undefined) {
    minYear = selectedYear - 1;
    maxYear = selectedYear + 1;
}

const minDate = `${minYear}-01-01T00:00:00`;
const maxDate = `${maxYear}-01-01T00:00:00`;
const backgroundcolor = Array.from({ length: 10 }, () => {
    const r1 = Math.floor(Math.random() * 255);
    const g1 = Math.floor(Math.random() * 255);
    const b1 = Math.floor(Math.random() * 255);
    return 'rgba(' + r1 + ',' + g1 + ',' + b1 + ', 0.7)';
});
const borderColor = Array.from({ length: 10 }, () => {
    const r1 = Math.floor(Math.random() * 255);
    const g1 = Math.floor(Math.random() * 255);
    const b1 = Math.floor(Math.random() * 255);
    return 'rgba(' + r1 + ',' + g1 + ',' + b1 + ', 0.7)';
});
                    window.myChart1 = new Chart(ctx1, {
                        type: 'line',
                        data: {
                            labels: cognomi,
                            datasets: [{
                                    label: 'data',
                                    backgroundColor: backgroundcolor,
                                    borderColor: borderColor,
                                    tension: 0.4,
                                    yAxisID: 'y',
                                    order: 1,
                                    data: labels1
                                },
                                {
                                    label: 'mese',
                                    backgroundColor: backgroundcolor,
                                    borderColor: borderColor,
                                    tension: 0.4,
                                    type: 'line',
                                    yAxisID: 'tempo',
                                    order: 2,
                                    data: values1
                                }
                            ]
                        },
                        options: {
                            responsive: true,
                            legend: {
                                display: false
                            },
                            title: {
                                display: true,
                                text: ''
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    grace: '5%',
                                    ticks: {
                                        stepsize: 1
                                    },
                                    type: 'time',
                                    position: 'left',
                                    time: {
                                        unit: 'year'
                                    },
                                    min: minDate,
                                    max: maxDate,
                                },
                                tempo: {
                                    beginAtZero: true,
                                    //grace: '5%',
                                    ticks: {
                                        stepsize: 1
                                    },
                                    type: 'linear',
                                    position: 'right',
                                    //  time: {
                                    //      unit: 'minute'
                                    // }
                                }
                            }
                        }

                    });
        }
        getdata1();
        // grafico a linee


        async function getdata2() {

            const response = await fetch('./process/process.php?page=' + page + query + '');

            const data = await response.json();
            const activitiesByPerson = {};

            data.data.forEach((activity) => {
                const cognome = activity.cognome;
                const datavolo = activity.datavolo;

                if (!activitiesByPerson[cognome]) {
                    activitiesByPerson[cognome] = [];
                }

                activitiesByPerson[cognome].push(datavolo);
            });

            const labels2 = Object.keys(activitiesByPerson);
            const values2 = Object.values(activitiesByPerson);

            if (window.myChart2 !== undefined)
                window.myChart2.destroy();

            const ctx = document.getElementById("cvChart2").getContext("2d");

            const currentDate = new Date();
            const currentYear = currentDate.getFullYear();

            window.myChart2 = new Chart(ctx, {
                responsive: true,
                type: 'line',
                data: {
                    labels: [], // Empty array for labels
                    datasets: labels2.map((cognome, index) => ({
                        label: cognome,
                        borderColor: getRandomColor(), // Assign random color
                        fill: false, // Disable filling area under the line
                        lineTension: 0.4,
                        data: values2[index].map(date => ({
                            x: new Date(date),
                            y: cognome
                        })) // Assign the date and name as coordinates
                    }))

                },
                options: {
                    legend: {
                        display: true
                    },
                    title: {
                        display: true,
                        text: 'Andamento delle attività effettuate per persona'
                    },
                    scales: {
                        x: {
                            type: 'time',
                            time: {
                                unit: 'day',
                            },
                            ticks: {
                                min: new Date(currentYear, 0, 1),
                                max: new Date(currentYear, 11, 31)
                            }
                        },
                        y: {
                            type: 'category',
                            labels: labels2
                        }
                    }
                }
            });

            function getRandomColor() {
                const letters = '0123456789ABCDEF';
                let color = '#';
                for (let i = 0; i < 6; i++) {
                    color += letters[Math.floor(Math.random() * 16)];
                }
                return color + "CC"; // opacità  0.8
            }


        }
        getdata2();

        }


    function make_skeleton() {
        var output = '<div class="row">';

        for (var count = 0; count < 10; count++) {
            output += '<div class="col-md-3 mb-3 p-4">';

            output += '<div class="mb-2 bg-light text-dark" style="height:240px;"></div>';

            output += '<div class="mb-2 bg-light text-dark" style="height:50px;"></div>';

            output += '<div class="mb-2 bg-light text-dark" style="height:25px;"></div>';

            output += '</div>';
        }

        output += '</div>';

        return output;
    }

    load_filter();

    function load_filter() {
        fetch('./process/process.php?action=filter').then(function(response) {

            return response.json();

        }).then(function(responseData) {
//console.log(responseData)
            if (responseData.nazest) {

                if (responseData.nazest.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.nazest.length; i++) {
                        html += '<label class="list-group-item">';

                        html += '<input style="width:120px" type="checkbox" class="form-check-input me-1 territorio" name="territorio" value="' + responseData.nazest[i].name + '"">';

                        html += responseData.nazest[i].name + ' <span class="text-muted">(' + responseData.nazest[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#territorio').innerHTML = html;

                    var territorio_elements = document.getElementsByClassName('territorio');

                    for (var i = 0; i < territorio_elements.length; i++) {
                        territorio_elements[i].onclick = function() {

                            load_product(page = 1, make_query());
                        }
                    }
                }

            }

            if (responseData.condizioni) {
                if (responseData.condizioni.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.condizioni.length; i++) {
                        //html += '<a href="#" class="list-group-item list-group-item-action volo_filter" id="'+responseData.mansionebordo[i].name+'"><span>&#8364;</span> '+responseData.mansionebordo[i].name+' <span class="text-muted">('+responseData.mansionebordo[i].total+')</a>';
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:120px"type="checkbox" class="form-check-input me-2 volo_filter" name="volo_filter" value="' + responseData.condizioni[i].name + '" />';

                        html += responseData.condizioni[i].name + ' <span class="text-muted">(' + responseData.condizioni[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#volo_filter').innerHTML = html;

                    var volo_filter_elements = document.getElementsByClassName('volo_filter');

                    for (var i = 0; i < volo_filter_elements.length; i++) {
                        volo_filter_elements[i].onclick = function() {
                            remove_active_class(volo_filter_elements);

                            this.classList.add('active');

                            load_product(page = 1, make_query());
                        }
                    }
                }
            }

            if (responseData.mansionebordo)

            {
                if (responseData.mansionebordo.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.mansionebordo.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:120px"type="checkbox" class="form-check-input me-2 qualifiche_filter" name="qualifiche_filter" value="' + responseData.mansionebordo[i].name + '" />';

                        html += responseData.mansionebordo[i].name + ' <span class="text-muted">(' + responseData.mansionebordo[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#qualifiche_filter').innerHTML = html;


                    var qualifiche_filter_elements = document.getElementsByClassName("qualifiche_filter");

                    for (var i = 0; i < qualifiche_filter_elements.length; i++) {
                        qualifiche_filter_elements[i].onclick = function() {

                            remove_active_class(qualifiche_filter_elements);

                            this.classList.add('active');

                            load_product(page = 1, make_query());

                        }
                    }
                }
            }

            if (responseData.targa)

            {
                if (responseData.targa.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.targa.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:200px"type="checkbox" class="form-check-input me-2 teil" name="teil" value="' + responseData.targa[i].name + '" />';

                        html += responseData.targa[i].name + ' <span class="text-muted">(' + responseData.targa[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#teil').innerHTML = html;


                    var targa_elements = document.getElementsByClassName("teil");

                    for (var i = 0; i < targa_elements.length; i++) {
                        targa_elements[i].onclick = function() {

                            load_product(page = 1, make_query());

                        }
                    }
                }
            }

            if (responseData.cognome)

            {
                if (responseData.cognome.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.cognome.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:350px"type="checkbox" class="form-check-input me-2 utente" name="utente" value="' + responseData.cognome[i].name + '" />';

                        html += responseData.cognome[i].grado + responseData.cognome[i].name + ' <span class="text-muted">(' + responseData.cognome[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#utente').innerHTML = html;


                    var utente_elements = document.getElementsByClassName("utente");

                    for (var i = 0; i < utente_elements.length; i++) {
                        utente_elements[i].onclick = function() {

                            load_product(page = 1, make_query());

                        }
                    }
                }
            }

            if (responseData.datavolo)

            {
                if (responseData.datavolo.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.datavolo.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:230px"type="checkbox" class="form-check-input me-2 data_volo" name="data_volo" value="' + responseData.datavolo[i].name + '" />';

                        html += responseData.datavolo[i].name + ' <span class="text-muted">(' + responseData.datavolo[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#data_volo').innerHTML = html;


                    var datavolo_elements = document.getElementsByClassName("data_volo");

                    for (var i = 0; i < datavolo_elements.length; i++) {
                        datavolo_elements[i].onclick = function() {

                            load_product(page = 1, make_query());

                        }
                    }
                }
            }
            ////// inizio qualifiche
            if (responseData.pa)

            {
                if (responseData.pa.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.pa.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:230px"type="checkbox" class="form-check-input me-2 pa" name="pa" value="' + responseData.pa[i].name + '" />';

                        html += responseData.pa[i].name + ' <span class="text-muted">(' + responseData.pa[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#qualifiche_pa').innerHTML = html;


                    var pa_elements = document.getElementsByClassName("pa");

                    for (var i = 0; i < pa_elements.length; i++) {
                        pa_elements[i].onclick = function() {

                            load_product(page = 1, make_query());

                        }
                    }
                }
            }

            if (responseData.qual_elirec_a1)

            {
                if (responseData.qual_elirec_a1.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.qual_elirec_a1.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:230px"type="checkbox" class="form-check-input me-2 qual_elirec_a1" name="qual_elirec_a1" value="' + responseData.qual_elirec_a1[i].name + '" />';

                        html += responseData.qual_elirec_a1[i].name + ' <span class="text-muted">(' + responseData.qual_elirec_a1[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#qualifiche_elirec_a1').innerHTML = html;


                    var qual_elirec_a1_elements = document.getElementsByClassName("qual_elirec_a1");

                    for (var i = 0; i < qual_elirec_a1_elements.length; i++) {
                        qual_elirec_a1_elements[i].onclick = function() {

                            load_product(page = 1, make_query());

                        }
                    }
                }
            }

            if (responseData.qual_elirec_a2)

            {
                if (responseData.qual_elirec_a2.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.qual_elirec_a2.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:230px"type="checkbox" class="form-check-input me-2 qual_elirec_a2" name="qual_elirec_a2" value="' + responseData.qual_elirec_a2[i].name + '" />';

                        html += responseData.qual_elirec_a2[i].name + ' <span class="text-muted">(' + responseData.qual_elirec_a2[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#qualifiche_elirec_a2').innerHTML = html;


                    var qual_elirec_a2_elements = document.getElementsByClassName("qual_elirec_a2");

                    for (var i = 0; i < qual_elirec_a2_elements.length; i++) {
                        qual_elirec_a2_elements[i].onclick = function() {

                            load_product(page = 1, make_query());

                        }
                    }
                }
            }

            if (responseData.qual_elirec_b1)

            {
                if (responseData.qual_elirec_b1.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.qual_elirec_b1.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:230px"type="checkbox" class="form-check-input me-2 qual_elirec_b1" name="qual_elirec_b1" value="' + responseData.qual_elirec_b1[i].name + '" />';

                        html += responseData.qual_elirec_b1[i].name + ' <span class="text-muted">(' + responseData.qual_elirec_b1[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#qualifiche_elirec_b1').innerHTML = html;


                    var qual_elirec_b1_elements = document.getElementsByClassName("qual_elirec_b1");

                    for (var i = 0; i < qual_elirec_b1_elements.length; i++) {
                        qual_elirec_b1_elements[i].onclick = function() {

                            load_product(page = 1, make_query());

                        }
                    }
                }
            }

            if (responseData.qual_elirec_b2)

            {
                if (responseData.qual_elirec_b2.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.qual_elirec_b2.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:230px"type="checkbox" class="form-check-input me-2 qual_elirec_b2" name="qual_elirec_b2" value="' + responseData.qual_elirec_b1[i].name + '" />';

                        html += responseData.qual_elirec_b2[i].name + ' <span class="text-muted">(' + responseData.qual_elirec_b2[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#qualifiche_elirec_b2').innerHTML = html;


                    var qual_elirec_b2_elements = document.getElementsByClassName("qual_elirec_b2");

                    for (var i = 0; i < qual_elirec_b2_elements.length; i++) {
                        qual_elirec_b2_elements[i].onclick = function() {

                            load_product(page = 1, make_query());

                        }
                    }
                }
            }

            if (responseData.qual_cda)

            {
                if (responseData.qual_cda.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.qual_cda.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:230px"type="checkbox" class="form-check-input me-2 qual_cda" name="qual_cda" value="' + responseData.qual_cda[i].name + '" />';

                        html += responseData.qual_cda[i].name + ' <span class="text-muted">(' + responseData.qual_cda[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#qualifiche_cda').innerHTML = html;


                    var cda_elements = document.getElementsByClassName("qual_cda");

                    for (var i = 0; i < cda_elements.length; i++) {
                        cda_elements[i].onclick = function() {

                            load_product(page = 1, make_query());

                        }
                    }
                }
            }

            if (responseData.tob)

            {
                if (responseData.tob.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.tob.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:230px"type="checkbox" class="form-check-input me-2 tob" name="tob" value="' + responseData.tob[i].name + '" />';

                        html += responseData.tob[i].name + ' <span class="text-muted">(' + responseData.tob[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#qualifiche_tob').innerHTML = html;


                    var tob_elements = document.getElementsByClassName("tob");

                    for (var i = 0; i < tob_elements.length; i++) {
                        tob_elements[i].onclick = function() {

                            load_product(page = 1, make_query());

                        }
                    }
                }
            }

            if (responseData.qual_t)

            {
                if (responseData.qual_t.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.qual_t.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:230px"type="checkbox" class="form-check-input me-2 qual_t" name="qual_t" value="' + responseData.qual_t[i].name + '" />';

                        html += responseData.qual_t[i].name + ' <span class="text-muted">(' + responseData.qual_t[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#qualifiche_t').innerHTML = html;


                    var t_elements = document.getElementsByClassName("qual_t");

                    for (var i = 0; i < t_elements.length; i++) {
                        t_elements[i].onclick = function() {

                            load_product(page = 1, make_query());

                        }
                    }
                }
            }

            if (responseData.pc)

            {
                if (responseData.pc.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.pc.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:230px"type="checkbox" class="form-check-input me-2 pc" name="pc" value="' + responseData.pc[i].name + '" />';

                        html += responseData.pc[i].name + ' <span class="text-muted">(' + responseData.pc[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#qualifiche_pc').innerHTML = html;


                    var pc_elements = document.getElementsByClassName("pc");

                    for (var i = 0; i < pc_elements.length; i++) {
                        pc_elements[i].onclick = function() {

                            load_product(page = 1, make_query());

                        }
                    }
                }
            }

            if (responseData.p_i)

            {
                if (responseData.p_i.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.p_i.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:230px"type="checkbox" class="form-check-input me-2 p_i" name="p_i" value="' + responseData.p_i[i].name + '" />';

                        html += responseData.p_i[i].name + ' <span class="text-muted">(' + responseData.p_i[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#qualifiche_p_i').innerHTML = html;


                    var p_i_elements = document.getElementsByClassName("p_i");

                    for (var i = 0; i < p_i_elements.length; i++) {
                        p_i_elements[i].onclick = function() {

                            load_product(page = 1, make_query());

                        }
                    }
                }
            }

            if (responseData.pes)

            {
                if (responseData.pes.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.pes.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:230px"type="checkbox" class="form-check-input me-2 pes" name="pes" value="' + responseData.pes[i].name + '" />';

                        html += responseData.pes[i].name + ' <span class="text-muted">(' + responseData.pes[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#qualifiche_pes').innerHTML = html;


                    var pes_elements = document.getElementsByClassName("pes");

                    for (var i = 0; i < pes_elements.length; i++) {
                        pes_elements[i].onclick = function() {

                            load_product(page = 1, make_query());

                        }
                    }
                }
            }

            if (responseData.qual_ti)

            {
                if (responseData.qual_ti.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.qual_ti.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:230px"type="checkbox" class="form-check-input me-2 qual_ti" name="qual_ti" value="' + responseData.qual_ti[i].name + '" />';

                        html += responseData.qual_ti[i].name + ' <span class="text-muted">(' + responseData.qual_ti[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#qualifiche_ti').innerHTML = html;


                    var ti_elements = document.getElementsByClassName("qual_ti");

                    for (var i = 0; i < ti_elements.length; i++) {
                        ti_elements[i].onclick = function() {

                            load_product(page = 1, make_query());

                        }
                    }
                }
            }

            if (responseData.qual_etp)

            {
                if (responseData.qual_etp.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.qual_etp.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:230px"type="checkbox" class="form-check-input me-2 qual_etp" name="qual_etp" value="' + responseData.qual_etp[i].name + '" />';

                        html += responseData.qual_etp[i].name + ' <span class="text-muted">(' + responseData.qual_etp[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#qualifiche_etp').innerHTML = html;


                    var etp_elements = document.getElementsByClassName("qual_etp");

                    for (var i = 0; i < etp_elements.length; i++) {
                        etp_elements[i].onclick = function() {

                            load_product(page = 1, make_query());

                        }
                    }
                }
            }

            if (responseData.pid)

            {
                if (responseData.pid.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.pid.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:230px"type="checkbox" class="form-check-input me-2 pid" name="pid" value="' + responseData.pid[i].name + '" />';

                        html += responseData.pid[i].name + ' <span class="text-muted">(' + responseData.pid[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#qualifiche_pid').innerHTML = html;


                    var pid_elements = document.getElementsByClassName("pid");

                    for (var i = 0; i < pid_elements.length; i++) {
                        pid_elements[i].onclick = function() {

                            load_product(page = 1, make_query());

                        }
                    }
                }
            }

            if (responseData.tp)

            {
                if (responseData.tp.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.tp.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:230px"type="checkbox" class="form-check-input me-2 tp" name="tp" value="' + responseData.tp[i].name + '" />';

                        html += responseData.tp[i].name + ' <span class="text-muted">(' + responseData.tp[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#qualifiche_tp').innerHTML = html;


                    var tp_elements = document.getElementsByClassName("tp");

                    for (var i = 0; i < tp_elements.length; i++) {
                        tp_elements[i].onclick = function() {

                            load_product(page = 1, make_query());

                        }
                    }
                }
            }

            if (responseData.pcp)

            {
                if (responseData.pcp.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.pcp.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:230px"type="checkbox" class="form-check-input me-2 pcp" name="pcp" value="' + responseData.pcp[i].name + '" />';

                        html += responseData.pcp[i].name + ' <span class="text-muted">(' + responseData.pcp[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#qualifiche_pcp').innerHTML = html;


                    var pcp_elements = document.getElementsByClassName("pcp");

                    for (var i = 0; i < pcp_elements.length; i++) {
                        pcp_elements[i].onclick = function() {

                            load_product(page = 1, make_query());

                        }
                    }
                }
            }

            if (responseData.qual_pcs)

            {
                if (responseData.qual_pcs.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.qual_pcs.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:230px"type="checkbox" class="form-check-input me-2 qual_pcs" name="qual_pcs" value="' + responseData.qual_pcs[i].name + '" />';

                        html += responseData.qual_pcs[i].name + ' <span class="text-muted">(' + responseData.qual_pcs[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#qualifiche_pcs').innerHTML = html;


                    var pcs_elements = document.getElementsByClassName("qual_pcs");

                    for (var i = 0; i < pcs_elements.length; i++) {
                        pcs_elements[i].onclick = function() {

                            load_product(page = 1, make_query());

                        }
                    }
                }
            }

            if (responseData.qual_ssa1)

            {
                if (responseData.qual_ssa1.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.qual_ssa1.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:230px"type="checkbox" class="form-check-input me-2 qual_ssa1" name="qual_ssa1" value="' + responseData.qual_ssa1[i].name + '" />';

                        html += responseData.qual_ssa1[i].name + ' <span class="text-muted">(' + responseData.qual_ssa1[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#qualifiche_ssa1').innerHTML = html;


                    var ssa1_elements = document.getElementsByClassName("qual_ssa1");

                    for (var i = 0; i < ssa1_elements.length; i++) {
                        ssa1_elements[i].onclick = function() {

                            load_product(page = 1, make_query());

                        }
                    }
                }
            }

            if (responseData.qual_ssa2)

            {
                if (responseData.qual_ssa2.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.qual_ssa2.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:230px"type="checkbox" class="form-check-input me-2 qual_ssa2" name="qual_ssa2" value="' + responseData.qual_ssa2[i].name + '" />';

                        html += responseData.qual_ssa2[i].name + ' <span class="text-muted">(' + responseData.qual_ssa2[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#qualifiche_ssa2').innerHTML = html;


                    var ssa2_elements = document.getElementsByClassName("qual_ssa2");

                    for (var i = 0; i < ssa2_elements.length; i++) {
                        ssa2_elements[i].onclick = function() {

                            load_product(page = 1, make_query());

                        }
                    }
                }
            }

            if (responseData.qual_tcs)

            {
                if (responseData.qual_tcs.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.qual_tcs.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:230px"type="checkbox" class="form-check-input me-2 qual_tcs" name="qual_tcs" value="' + responseData.qual_tcs[i].name + '" />';

                        html += responseData.qual_tcs[i].name + ' <span class="text-muted">(' + responseData.qual_tcs[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#qualifiche_tcs').innerHTML = html;


                    var tcs_elements = document.getElementsByClassName("qual_tcs");

                    for (var i = 0; i < tcs_elements.length; i++) {
                        tcs_elements[i].onclick = function() {

                            load_product(page = 1, make_query());

                        }
                    }
                }
            }

            if (responseData.qual_y)

            {
                if (responseData.qual_y.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.qual_y.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:230px"type="checkbox" class="form-check-input me-2 qual_y" name="qual_y" value="' + responseData.qual_y[i].name + '" />';

                        html += responseData.qual_y[i].name + ' <span class="text-muted">(' + responseData.qual_y[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#qualifiche_y').innerHTML = html;


                    var y_elements = document.getElementsByClassName("qual_y");

                    for (var i = 0; i < y_elements.length; i++) {
                        y_elements[i].onclick = function() {

                            load_product(page = 1, make_query());

                        }
                    }
                }
            }

            if (responseData.qual_g1)

            {
                if (responseData.qual_g1.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.qual_g1.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:230px"type="checkbox" class="form-check-input me-2 qual_g1" name="qual_g1" value="' + responseData.qual_g1[i].name + '" />';

                        html += responseData.qual_g1[i].name + ' <span class="text-muted">(' + responseData.qual_g1[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#qualifiche_g1').innerHTML = html;


                    var g1_elements = document.getElementsByClassName("qual_g1");

                    for (var i = 0; i < g1_elements.length; i++) {
                        g1_elements[i].onclick = function() {

                            load_product(page = 1, make_query());

                        }
                    }
                }
            }

            if (responseData.qual_g2)

            {
                if (responseData.qual_g2.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.qual_g2.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:230px"type="checkbox" class="form-check-input me-2 qual_g2" name="qual_g2" value="' + responseData.qual_g2[i].name + '" />';

                        html += responseData.qual_g2[i].name + ' <span class="text-muted">(' + responseData.qual_g2[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#qualifiche_g2').innerHTML = html;


                    var g2_elements = document.getElementsByClassName("qual_g2");

                    for (var i = 0; i < g2_elements.length; i++) {
                        g2_elements[i].onclick = function() {

                            load_product(page = 1, make_query());

                        }
                    }
                }
            }

            if (responseData.qual_g3)

            {
                if (responseData.qual_g3.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.qual_g3.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:230px"type="checkbox" class="form-check-input me-2 qual_g3" name="qual_g3" value="' + responseData.qual_g3[i].name + '" />';

                        html += responseData.qual_g3[i].name + ' <span class="text-muted">(' + responseData.qual_g3[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#qualifiche_g3').innerHTML = html;


                    var g3_elements = document.getElementsByClassName("qual_g3");

                    for (var i = 0; i < g3_elements.length; i++) {
                        g3_elements[i].onclick = function() {

                            load_product(page = 1, make_query());

                        }
                    }
                }
            }

            if (responseData.qual_h)

            {
                if (responseData.qual_h.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.qual_h.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:230px"type="checkbox" class="form-check-input me-2 qual_h" name="qual_h" value="' + responseData.qual_h[i].name + '" />';

                        html += responseData.qual_h[i].name + ' <span class="text-muted">(' + responseData.qual_h[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#qualifiche_h').innerHTML = html;


                    var h_elements = document.getElementsByClassName("qual_h");

                    for (var i = 0; i < h_elements.length; i++) {
                        h_elements[i].onclick = function() {

                            load_product(page = 1, make_query());

                        }
                    }
                }
            }

            if (responseData.qual_f1)

            {
                if (responseData.qual_f1.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.qual_f1.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:230px"type="checkbox" class="form-check-input me-2 qual_f1" name="qual_f1" value="' + responseData.qual_f1[i].name + '" />';

                        html += responseData.qual_f1[i].name + ' <span class="text-muted">(' + responseData.qual_f1[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#qualifiche_f1').innerHTML = html;


                    var f1_elements = document.getElementsByClassName("qual_f1");

                    for (var i = 0; i < f1_elements.length; i++) {
                        f1_elements[i].onclick = function() {

                            load_product(page = 1, make_query());

                        }
                    }
                }
            }

            if (responseData.qual_f2)

            {
                if (responseData.qual_f2.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.qual_f2.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:230px"type="checkbox" class="form-check-input me-2 qual_f2" name="qual_f2" value="' + responseData.qual_f2[i].name + '" />';

                        html += responseData.qual_f2[i].name + ' <span class="text-muted">(' + responseData.qual_f2[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#qualifiche_f2').innerHTML = html;


                    var f2_elements = document.getElementsByClassName("qual_f2");

                    for (var i = 0; i < f2_elements.length; i++) {
                        f2_elements[i].onclick = function() {

                            load_product(page = 1, make_query());

                        }
                    }
                }
            }

            if (responseData.qual_f3)

            {
                if (responseData.qual_f3.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.qual_f3.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:230px"type="checkbox" class="form-check-input me-2 qual_f3" name="qual_f3" value="' + responseData.qual_f3[i].name + '" />';

                        html += responseData.qual_f3[i].name + ' <span class="text-muted">(' + responseData.qual_f3[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#qualifiche_f3').innerHTML = html;


                    var f3_elements = document.getElementsByClassName("qual_f3");

                    for (var i = 0; i < f3_elements.length; i++) {
                        f3_elements[i].onclick = function() {

                            load_product(page = 1, make_query());

                        }
                    }
                }
            }

            if (responseData.qual_i)

            {
                if (responseData.qual_i.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.qual_i.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:230px"type="checkbox" class="form-check-input me-2 qual_i" name="qual_i" value="' + responseData.qual_i[i].name + '" />';

                        html += responseData.qual_i[i].name + ' <span class="text-muted">(' + responseData.qual_i[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#qualifiche_i').innerHTML = html;


                    var i_elements = document.getElementsByClassName("qual_i");

                    for (var i = 0; i < i_elements.length; i++) {
                        i_elements[i].onclick = function() {

                            load_product(page = 1, make_query());

                        }
                    }
                }
            }

            if (responseData.qual_b1)

            {
                if (responseData.qual_b1.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.qual_b1.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:230px"type="checkbox" class="form-check-input me-2 qual_b1" name="qual_b1" value="' + responseData.qual_b1[i].name + '" />';

                        html += responseData.qual_b1[i].name + ' <span class="text-muted">(' + responseData.qual_b1[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#qualifiche_b1').innerHTML = html;


                    var b1_elements = document.getElementsByClassName("qual_b1");

                    for (var i = 0; i < b1_elements.length; i++) {
                        b1_elements[i].onclick = function() {

                            load_product(page = 1, make_query());

                        }
                    }
                }
            }

            if (responseData.qual_b2)

            {
                if (responseData.qual_b2.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.qual_b2.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:230px"type="checkbox" class="form-check-input me-2 qual_b2" name="qual_b2" value="' + responseData.qual_b2[i].name + '" />';

                        html += responseData.qual_b2[i].name + ' <span class="text-muted">(' + responseData.qual_b2[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#qualifiche_b2').innerHTML = html;


                    var b2_elements = document.getElementsByClassName("qual_b2");

                    for (var i = 0; i < b2_elements.length; i++) {
                        b2_elements[i].onclick = function() {

                            load_product(page = 1, make_query());

                        }
                    }
                }
            }

            if (responseData.qual_c1)

            {
                if (responseData.qual_c1.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.qual_c1.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:230px"type="checkbox" class="form-check-input me-2 qual_c1" name="qual_c1" value="' + responseData.qual_c1[i].name + '" />';

                        html += responseData.qual_c1[i].name + ' <span class="text-muted">(' + responseData.qual_c1[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#qualifiche_c1').innerHTML = html;


                    var c1_elements = document.getElementsByClassName("qual_c1");

                    for (var i = 0; i < c1_elements.length; i++) {
                        c1_elements[i].onclick = function() {

                            load_product(page = 1, make_query());

                        }
                    }
                }
            }

            if (responseData.qual_c2)

            {
                if (responseData.qual_c2.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.qual_c2.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:230px"type="checkbox" class="form-check-input me-2 qual_c2" name="qual_c2" value="' + responseData.qual_c2[i].name + '" />';

                        html += responseData.qual_c2[i].name + ' <span class="text-muted">(' + responseData.qual_c2[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#qualifiche_c2').innerHTML = html;


                    var c2_elements = document.getElementsByClassName("qual_c2");

                    for (var i = 0; i < c2_elements.length; i++) {
                        c2_elements[i].onclick = function() {

                            load_product(page = 1, make_query());

                        }
                    }
                }
            }

            if (responseData.qual_v1)

            {
                if (responseData.qual_v1.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.qual_v1.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:230px"type="checkbox" class="form-check-input me-2 qual_v1" name="qual_v1" value="' + responseData.qual_v1[i].name + '" />';

                        html += responseData.qual_v1[i].name + ' <span class="text-muted">(' + responseData.qual_v1[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#qualifiche_v1').innerHTML = html;


                    var v1_elements = document.getElementsByClassName("qual_v1");

                    for (var i = 0; i < v1_elements.length; i++) {
                        v1_elements[i].onclick = function() {

                            load_product(page = 1, make_query());

                        }
                    }
                }
            }
            if (responseData.qual_v2)

            {
                if (responseData.qual_v2.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.qual_v2.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:230px"type="checkbox" class="form-check-input me-2 qual_v2" name="qual_v2" value="' + responseData.qual_v2[i].name + '" />';

                        html += responseData.qual_v2[i].name + ' <span class="text-muted">(' + responseData.qual_v2[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#qualifiche_v2').innerHTML = html;


                    var v2_elements = document.getElementsByClassName("qual_v2");

                    for (var i = 0; i < v2_elements.length; i++) {
                        v2_elements[i].onclick = function() {

                            load_product(page = 1, make_query());

                        }
                    }
                }
            }

            if (responseData.qual_m)

            {
                if (responseData.qual_m.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.qual_m.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:230px"type="checkbox" class="form-check-input me-2 qual_m" name="qual_m" value="' + responseData.qual_m[i].name + '" />';

                        html += responseData.qual_m[i].name + ' <span class="text-muted">(' + responseData.qual_m[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#qualifiche_m').innerHTML = html;


                    var m_elements = document.getElementsByClassName("qual_m");

                    for (var i = 0; i < m_elements.length; i++) {
                        m_elements[i].onclick = function() {

                            load_product(page = 1, make_query());

                        }
                    }
                }
            }
            if (responseData.qual_a1)

            {
                if (responseData.qual_a1.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.qual_a1.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:230px"type="checkbox" class="form-check-input me-2 qual_a1" name="qual_a1" value="' + responseData.qual_a1[i].name + '" />';

                        html += responseData.qual_a1[i].name + ' <span class="text-muted">(' + responseData.qual_a1[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#qualifiche_a1').innerHTML = html;


                    var a1_elements = document.getElementsByClassName("qual_a1");

                    for (var i = 0; i < a1_elements.length; i++) {
                        a1_elements[i].onclick = function() {

                            load_product(page = 1, make_query());

                        }
                    }
                }
            }

            if (responseData.qual_a2)

            {
                if (responseData.qual_a2.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.qual_a2.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:230px"type="checkbox" class="form-check-input me-2 qual_a2" name="qual_a2" value="' + responseData.qual_a2[i].name + '" />';

                        html += responseData.qual_a2[i].name + ' <span class="text-muted">(' + responseData.qual_a2[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#qualifiche_a2').innerHTML = html;


                    var a2_elements = document.getElementsByClassName("qual_a2");

                    for (var i = 0; i < a2_elements.length; i++) {
                        a2_elements[i].onclick = function() {

                            load_product(page = 1, make_query());

                        }
                    }
                }
            }

            if (responseData.qual_l1)

            {
                if (responseData.qual_l1.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.qual_l1.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:230px"type="checkbox" class="form-check-input me-2 qual_l1" name="qual_l1" value="' + responseData.qual_l1[i].name + '" />';

                        html += responseData.qual_l1[i].name + ' <span class="text-muted">(' + responseData.qual_l1[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#qualifiche_l1').innerHTML = html;


                    var l1_elements = document.getElementsByClassName("qual_l1");

                    for (var i = 0; i < l1_elements.length; i++) {
                        l1_elements[i].onclick = function() {

                            load_product(page = 1, make_query());

                        }
                    }
                }
            }

            if (responseData.qual_l2)

            {
                if (responseData.qual_l2.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.qual_l2.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:230px"type="checkbox" class="form-check-input me-2 qual_l2" name="qual_l2" value="' + responseData.qual_l2[i].name + '" />';

                        html += responseData.qual_l2[i].name + ' <span class="text-muted">(' + responseData.qual_l2[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#qualifiche_l2').innerHTML = html;


                    var l2_elements = document.getElementsByClassName("qual_l2");

                    for (var i = 0; i < l2_elements.length; i++) {
                        l2_elements[i].onclick = function() {

                            load_product(page = 1, make_query());

                        }
                    }
                }
            }

            if (responseData.qual_rdr1)

            {
                if (responseData.qual_rdr1.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.qual_rdr1.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:230px"type="checkbox" class="form-check-input me-2 qual_rdr1" name="qual_rdr1" value="' + responseData.qual_rdr1[i].name + '" />';

                        html += responseData.qual_rdr1[i].name + ' <span class="text-muted">(' + responseData.qual_rdr1[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#qualifiche_rdr1').innerHTML = html;


                    var rdr1_elements = document.getElementsByClassName("qual_rdr1");

                    for (var i = 0; i < rdr1_elements.length; i++) {
                        rdr1_elements[i].onclick = function() {

                            load_product(page = 1, make_query());

                        }
                    }
                }
            }

            if (responseData.qual_rdr2)

            {
                if (responseData.qual_rdr2.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.qual_rdr2.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:230px"type="checkbox" class="form-check-input me-2 qual_rdr2" name="qual_rdr2" value="' + responseData.qual_rdr2[i].name + '" />';

                        html += responseData.qual_rdr2[i].name + ' <span class="text-muted">(' + responseData.qual_rdr2[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#qualifiche_rdr2').innerHTML = html;


                    var rdr2_elements = document.getElementsByClassName("qual_rdr2");

                    for (var i = 0; i < rdr2_elements.length; i++) {
                        rdr2_elements[i].onclick = function() {

                            load_product(page = 1, make_query());

                        }
                    }
                }
            }

            if (responseData.qual_ap)

            {
                if (responseData.qual_ap.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.qual_ap.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:230px"type="checkbox" class="form-check-input me-2 qual_ap" name="qual_ap" value="' + responseData.qual_ap[i].name + '" />';

                        html += responseData.qual_ap[i].name + ' <span class="text-muted">(' + responseData.qual_ap[i].total + ')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#qualifiche_ap').innerHTML = html;


                    var ap_elements = document.getElementsByClassName("qual_ap");

                    for (var i = 0; i < ap_elements.length; i++) {
                        ap_elements[i].onclick = function() {

                            load_product(page = 1, make_query());

                        }
                    }
                }
            }
            ///// fine qualifiche

            if (responseData.anno) {

                if (responseData.anno.length > 0) {
                    var html = '<div class="list-group">';

                    for (var i = 0; i < responseData.anno.length; i++) {
                        html += '<label  class="list-group-item">';

                        html += '<input style="width:200px"type="checkbox" class="form-check-input me-2 anno" name="anno" value="' + responseData.anno[i].name + '" />';

                        html += responseData.anno[i].name + ' <span class="text-muted">(' + responseData.anno[i].total + ')</span>';

                        html += '</label>';

                    }

                    html += '</div>';

                    $('#anno').innerHTML = html;


                    var anno_elements = document.getElementsByClassName("anno");

                    for (var i = 0; i < anno_elements.length; i++) {
                        anno_elements[i].onclick = function() {

                            load_product(page = 1, make_query());
                        }
                    }

                }

            }

        });
    }

    function make_query() {
        var query = '';

        var territorio_elements = document.getElementsByClassName('territorio');

        for (var i = 0; i < territorio_elements.length; i++) {
            if (territorio_elements[i].checked) {
                query += '&territorio=' + territorio_elements[i].value + '';
            }
        }

        var volo_filter_elements = document.getElementsByClassName('volo_filter');

        var volochelist = '';

        for (var i = 0; i < volo_filter_elements.length; i++) {
            //if(volo_filter_elements[i].matches('.active'))
            if (volo_filter_elements[i].checked) {
                // query += '&volo_filter='+volo_filter_elements[i].getAttribute('id')+'';
                volochelist += volo_filter_elements[i].value + ',';
            }
        }

        if (volochelist != '') {
            query += '&volo_filter=' + volochelist + '';
        }

        var qualifiche_filter_elements = document.getElementsByClassName('qualifiche_filter');

        var qualifichelist = '';


        for (var i = 0; i < qualifiche_filter_elements.length; i++) {
            if (qualifiche_filter_elements[i].checked) {
                qualifichelist += qualifiche_filter_elements[i].value + ',';

            }
        }

        if (qualifichelist != '') {
            query += '&qualifiche_filter=' + qualifichelist + '';
        }

        var targa_filter_elements = document.getElementsByClassName('teil');

        var targalist = '';


        for (var i = 0; i < targa_filter_elements.length; i++) {
            if (targa_filter_elements[i].checked) {
                targalist += targa_filter_elements[i].value + ',';
            }
        }

        if (targalist != '') {
            query += '&teil=' + targalist + '';
        }

        var cognome_filter_elements = document.getElementsByClassName('utente');

        var cognomelist = '';


        for (var i = 0; i < cognome_filter_elements.length; i++) {
            if (cognome_filter_elements[i].checked) {
                cognomelist += cognome_filter_elements[i].value + ',';
            }

        }

        if (cognomelist != '') {
            query += '&utente=' + cognomelist + '';
        }

        var datavolo_filter_elements = document.getElementsByClassName('data_volo');

        var datavololist = '';


        for (var i = 0; i < datavolo_filter_elements.length; i++) {
            if (datavolo_filter_elements[i].checked) {
                datavololist += datavolo_filter_elements[i].value + ',';
            }
        }

        if (datavololist != '') {
            query += '&data_volo=' + datavololist + '';
        }


        var tob_filter_elements = document.getElementsByClassName('tob');

        var toblolist = '';


        for (var i = 0; i < tob_filter_elements.length; i++) {
            if (tob_filter_elements[i].checked) {
                toblolist += tob_filter_elements[i].value + ',';
            }
        }

        if (toblolist != '') {
            query += '&qualifiche_tob=' + toblolist + '';
        }

        
        
        var pa_filter_elements = document.getElementsByClassName('pa');

        var palolist = '';


        for (var i = 0; i < pa_filter_elements.length; i++) {
            if (pa_filter_elements[i].checked) {
                palolist += pa_filter_elements[i].value + ',';
            }
        }

        if (palolist != '') {
            query += '&qualifiche_pa=' + palolist + '';
        }
        
        var qual_elirec_a1_filter_elements = document.getElementsByClassName('qual_elirec_a1');

        var qual_elirec_a1list = '';


        for (var i = 0; i < qual_elirec_a1_filter_elements.length; i++) {
            if (qual_elirec_a1_filter_elements[i].checked) {
                qual_elirec_a1list += qual_elirec_a1_filter_elements[i].value + ',';
            }
        }

        if (qual_elirec_a1list != '') {
            query += '&qualifiche_elirec_a1=' + qual_elirec_a1list + '';
        }

        var qual_elirec_a2_filter_elements = document.getElementsByClassName('qual_elirec_a2');

        var qual_elirec_a2list = '';


        for (var i = 0; i < qual_elirec_a2_filter_elements.length; i++) {
            if (qual_elirec_a2_filter_elements[i].checked) {
                qual_elirec_a2list += qual_elirec_a2_filter_elements[i].value + ',';
            }
        }

        if (qual_elirec_a2list != '') {
            query += '&qualifiche_elirec_a2=' + qual_elirec_a2list + '';
        }
        
        var qual_elirec_b1_filter_elements = document.getElementsByClassName('qual_elirec_b1');

        var qual_elirec_b1list = '';


        for (var i = 0; i < qual_elirec_b1_filter_elements.length; i++) {
            if (qual_elirec_b1_filter_elements[i].checked) {
                qual_elirec_b1list += qual_elirec_b1_filter_elements[i].value + ',';
            }
        }

        if (qual_elirec_b1list != '') {
            query += '&qualifiche_elirec_b1=' + qual_elirec_b1list + '';
        }

        var qual_elirec_b2_filter_elements = document.getElementsByClassName('qual_elirec_b2');

        var qual_elirec_b2list = '';


        for (var i = 0; i < qual_elirec_b2_filter_elements.length; i++) {
            if (qual_elirec_b2_filter_elements[i].checked) {
                qual_elirec_b2list += qual_elirec_b2_filter_elements[i].value + ',';
            }
        }

        if (qual_elirec_b2list != '') {
            query += '&qualifiche_elirec_b2=' + qual_elirec_b2list + '';
        }
        
        var qual_cda_filter_elements = document.getElementsByClassName('qual_cda');

        var qual_cdalist = '';


        for (var i = 0; i < qual_cda_filter_elements.length; i++) {
            if (qual_cda_filter_elements[i].checked) {
                qual_cdalist += qual_cda_filter_elements[i].value + ',';
            }
        }

        if (qual_cdalist != '') {
            query += '&qualifiche_cda=' + qual_cdalist + '';
        }
        
        var qual_t_filter_elements = document.getElementsByClassName('qual_t');

        var qual_t_list = '';


        for (var i = 0; i < qual_t_filter_elements.length; i++) {
            if (qual_t_filter_elements[i].checked) {
                qual_t_list += qual_t_filter_elements[i].value + ',';
            }
        }

        if (qual_t_list != '') {
            query += '&qualifiche_t=' + qual_t_list + '';
        }
        
        var pc_filter_elements = document.getElementsByClassName('pc');

        var pc_list = '';


        for (var i = 0; i < pc_filter_elements.length; i++) {
            if (pc_filter_elements[i].checked) {
                pc_list += pc_filter_elements[i].value + ',';
            }
        }

        if (pc_list != '') {
            query += '&qualifiche_pc=' + pc_list + '';
        }
        
        var p_i_filter_elements = document.getElementsByClassName('p_i');

        var p_i_list = '';


        for (var i = 0; i < p_i_filter_elements.length; i++) {
            if (p_i_filter_elements[i].checked) {
                p_i_list += p_i_filter_elements[i].value + ',';
            }
        }

        if (p_i_list != '') {
            query += '&qualifiche_p_i=' + p_i_list + '';
        }
        
        var pes_filter_elements = document.getElementsByClassName('pes');

        var pes_list = '';


        for (var i = 0; i < pes_filter_elements.length; i++) {
            if (pes_filter_elements[i].checked) {
                pes_list += pes_filter_elements[i].value + ',';
            }
        }

        if (pes_list != '') {
            query += '&qualifiche_pes=' + pes_list + '';
        }
        
        var qual_ti_filter_elements = document.getElementsByClassName('qual_ti');

        var qual_ti_list = '';


        for (var i = 0; i < qual_ti_filter_elements.length; i++) {
            if (qual_ti_filter_elements[i].checked) {
                qual_ti_list += qual_ti_filter_elements[i].value + ',';
            }
        }

        if (qual_ti_list != '') {
            query += '&qualifiche_ti=' + qual_ti_list + '';
        }
        
        var qual_etp_filter_elements = document.getElementsByClassName('qual_etp');

        var qual_etp_list = '';


        for (var i = 0; i < qual_etp_filter_elements.length; i++) {
            if (qual_etp_filter_elements[i].checked) {
                qual_etp_list += qual_etp_filter_elements[i].value + ',';
            }
        }

        if (qual_etp_list != '') {
            query += '&qualifiche_etp=' + qual_etp_list + '';
        }
        
        var pid_filter_elements = document.getElementsByClassName('pid');

        var pid_list = '';


        for (var i = 0; i < pid_filter_elements.length; i++) {
            if (pid_filter_elements[i].checked) {
                pid_list += pid_filter_elements[i].value + ',';
            }
        }

        if (pid_list != '') {
            query += '&qualifiche_pid=' + pid_list + '';
        }
        
        var tp_filter_elements = document.getElementsByClassName('tp');

        var tp_list = '';


        for (var i = 0; i < tp_filter_elements.length; i++) {
            if (tp_filter_elements[i].checked) {
                tp_list += tp_filter_elements[i].value + ',';
            }
        }

        if (tp_list != '') {
            query += '&qualifiche_tp=' + tp_list + '';
        }
        
        var pcp_filter_elements = document.getElementsByClassName('pcp');

        var pcp_list = '';


        for (var i = 0; i < pcp_filter_elements.length; i++) {
            if (pcp_filter_elements[i].checked) {
                pcp_list += pcp_filter_elements[i].value + ',';
            }
        }

        if (pcp_list != '') {
            query += '&qualifiche_pcp=' + pcp_list + '';
        }
        
        var qual_pcs_filter_elements = document.getElementsByClassName('qual_pcs');

        var qual_pcs_list = '';


        for (var i = 0; i < qual_pcs_filter_elements.length; i++) {
            if (qual_pcs_filter_elements[i].checked) {
                qual_pcs_list += qual_pcs_filter_elements[i].value + ',';
            }
        }

        if (qual_pcs_list != '') {
            query += '&qualifiche_pcs=' + qual_pcs_list + '';
        }
        
        var qual_ssa1_filter_elements = document.getElementsByClassName('qual_ssa1');

        var qual_ssa1_list = '';


        for (var i = 0; i < qual_ssa1_filter_elements.length; i++) {
            if (qual_ssa1_filter_elements[i].checked) {
                qual_ssa1_list += qual_ssa1_filter_elements[i].value + ',';
            }
        }

        if (qual_ssa1_list != '') {
            query += '&qualifiche_ssa1=' + qual_ssa1_list + '';
        }
        
        var qual_ssa2_filter_elements = document.getElementsByClassName('qual_ssa2');

        var qual_ssa2_list = '';


        for (var i = 0; i < qual_ssa2_filter_elements.length; i++) {
            if (qual_ssa2_filter_elements[i].checked) {
                qual_ssa2_list += qual_ssa2_filter_elements[i].value + ',';
            }
        }

        if (qual_ssa2_list != '') {
            query += '&qualifiche_ssa2=' + qual_ssa2_list + '';
        }

        var qual_tcs_filter_elements = document.getElementsByClassName('qual_tcs');

        var qual_tcs_list = '';


        for (var i = 0; i < qual_tcs_filter_elements.length; i++) {
            if (qual_tcs_filter_elements[i].checked) {
                qual_tcs_list += qual_tcs_filter_elements[i].value + ',';
            }
        }

        if (qual_tcs_list != '') {
            query += '&qualifiche_tcs=' + qual_tcs_list + '';
        }
        
        var qual_y_filter_elements = document.getElementsByClassName('qual_y');

        var qual_y_list = '';


        for (var i = 0; i < qual_y_filter_elements.length; i++) {
            if (qual_y_filter_elements[i].checked) {
                qual_y_list += qual_y_filter_elements[i].value + ',';
            }
        }

        if (qual_y_list != '') {
            query += '&qualifiche_y=' + qual_y_list + '';
        }
        
        var qual_g1_filter_elements = document.getElementsByClassName('qual_g1');

        var qual_g1_list = '';


        for (var i = 0; i < qual_g1_filter_elements.length; i++) {
            if (qual_g1_filter_elements[i].checked) {
                qual_g1_list += qual_g1_filter_elements[i].value + ',';
            }
        }

        if (qual_g1_list != '') {
            query += '&qualifiche_g1=' + qual_g1_list + '';
        }

        var qual_g2_filter_elements = document.getElementsByClassName('qual_g2');

        var qual_g2_list = '';


        for (var i = 0; i < qual_g2_filter_elements.length; i++) {
            if (qual_g2_filter_elements[i].checked) {
                qual_g2_list += qual_g2_filter_elements[i].value + ',';
            }
        }

        if (qual_g2_list != '') {
            query += '&qualifiche_g2=' + qual_g2_list + '';
        }

        var qual_g3_filter_elements = document.getElementsByClassName('qual_g3');

        var qual_g3_list = '';


        for (var i = 0; i < qual_g3_filter_elements.length; i++) {
            if (qual_g3_filter_elements[i].checked) {
                qual_g3_list += qual_g3_filter_elements[i].value + ',';
            }
        }

        if (qual_g3_list != '') {
            query += '&qualifiche_g3=' + qual_g3_list + '';
        }
        
        var qual_h_filter_elements = document.getElementsByClassName('qual_h');

        var qual_h_list = '';


        for (var i = 0; i < qual_h_filter_elements.length; i++) {
            if (qual_h_filter_elements[i].checked) {
                qual_h_list += qual_h_filter_elements[i].value + ',';
            }
        }

        if (qual_h_list != '') {
            query += '&qualifiche_h=' + qual_h_list + '';
        }
        
        var qual_f1_filter_elements = document.getElementsByClassName('qual_f1');

        var qual_f1_list = '';


        for (var i = 0; i < qual_f1_filter_elements.length; i++) {
            if (qual_f1_filter_elements[i].checked) {
                qual_f1_list += qual_f1_filter_elements[i].value + ',';
            }
        }

        if (qual_f1_list != '') {
            query += '&qualifiche_f1=' + qual_f1_list + '';
        }

        var qual_f2_filter_elements = document.getElementsByClassName('qual_f2');

        var qual_f2_list = '';


        for (var i = 0; i < qual_f2_filter_elements.length; i++) {
            if (qual_f2_filter_elements[i].checked) {
                qual_f2_list += qual_f2_filter_elements[i].value + ',';
            }
        }

        if (qual_f2_list != '') {
            query += '&qualifiche_f2=' + qual_f2_list + '';
        }

        var qual_f3_filter_elements = document.getElementsByClassName('qual_f3');

        var qual_f3_list = '';


        for (var i = 0; i < qual_f3_filter_elements.length; i++) {
            if (qual_f3_filter_elements[i].checked) {
                qual_f3_list += qual_f3_filter_elements[i].value + ',';
            }
        }

        if (qual_f3_list != '') {
            query += '&qualifiche_f3=' + qual_f3_list + '';
        }
                
        var qual_i_filter_elements = document.getElementsByClassName('qual_i');

        var qual_i_list = '';


        for (var i = 0; i < qual_i_filter_elements.length; i++) {
            if (qual_i_filter_elements[i].checked) {
                qual_i_list += qual_i_filter_elements[i].value + ',';
            }
        }

        if (qual_i_list != '') {
            query += '&qualifiche_i=' + qual_i_list + '';
        }
        
        var qual_b1_filter_elements = document.getElementsByClassName('qual_b1');

        var qual_b1_list = '';


        for (var i = 0; i < qual_b1_filter_elements.length; i++) {
            if (qual_b1_filter_elements[i].checked) {
                qual_b1_list += qual_b1_filter_elements[i].value + ',';
            }
        }

        if (qual_b1_list != '') {
            query += '&qualifiche_b1=' + qual_b1_list + '';
        }

        var qual_b2_filter_elements = document.getElementsByClassName('qual_b2');

        var qual_b2_list = '';


        for (var i = 0; i < qual_b2_filter_elements.length; i++) {
            if (qual_b2_filter_elements[i].checked) {
                qual_b2_list += qual_b2_filter_elements[i].value + ',';
            }
        }

        if (qual_b2_list != '') {
            query += '&qualifiche_b2=' + qual_b2_list + '';
        }
        
        var qual_c1_filter_elements = document.getElementsByClassName('qual_c1');

        var qual_c1_list = '';


        for (var i = 0; i < qual_c1_filter_elements.length; i++) {
            if (qual_c1_filter_elements[i].checked) {
                qual_c1_list += qual_c1_filter_elements[i].value + ',';
            }
        }

        if (qual_c1_list != '') {
            query += '&qualifiche_c1=' + qual_c1_list + '';
        }

        var qual_c2_filter_elements = document.getElementsByClassName('qual_c2');

        var qual_c2_list = '';


        for (var i = 0; i < qual_c2_filter_elements.length; i++) {
            if (qual_c2_filter_elements[i].checked) {
                qual_c2_list += qual_c2_filter_elements[i].value + ',';
            }
        }

        if (qual_c2_list != '') {
            query += '&qualifiche_c2=' + qual_c2_list + '';
        }
        
        var qual_v1_filter_elements = document.getElementsByClassName('qual_v1');

        var qual_v1_list = '';


        for (var i = 0; i < qual_v1_filter_elements.length; i++) {
            if (qual_v1_filter_elements[i].checked) {
                qual_v1_list += qual_v1_filter_elements[i].value + ',';
            }
        }

        if (qual_v1_list != '') {
            query += '&qualifiche_v1=' + qual_v1_list + '';
        }
        
        var qual_v2_filter_elements = document.getElementsByClassName('qual_v2');

        var qual_v2_list = '';


        for (var i = 0; i < qual_v2_filter_elements.length; i++) {
            if (qual_v2_filter_elements[i].checked) {
                qual_v2_list += qual_v2_filter_elements[i].value + ',';
            }
        }

        if (qual_v2_list != '') {
            query += '&qualifiche_v2=' + qual_v2_list + '';
        }

        var qual_m_filter_elements = document.getElementsByClassName('qual_m');

        var qual_m_list = '';


        for (var i = 0; i < qual_m_filter_elements.length; i++) {
            if (qual_m_filter_elements[i].checked) {
                qual_m_list += qual_m_filter_elements[i].value + ',';
            }
        }

        if (qual_m_list != '') {
            query += '&qualifiche_m=' + qual_m_list + '';
        }
        
        var qual_a1_filter_elements = document.getElementsByClassName('qual_a1');

        var qual_a1_list = '';


        for (var i = 0; i < qual_a1_filter_elements.length; i++) {
            if (qual_a1_filter_elements[i].checked) {
                qual_a1_list += qual_a1_filter_elements[i].value + ',';
            }
        }

        if (qual_a1_list != '') {
            query += '&qualifiche_a1=' + qual_a1_list + '';
        }
        
        var qual_a2_filter_elements = document.getElementsByClassName('qual_a2');

        var qual_a2_list = '';


        for (var i = 0; i < qual_a2_filter_elements.length; i++) {
            if (qual_a2_filter_elements[i].checked) {
                qual_a2_list += qual_a2_filter_elements[i].value + ',';
            }
        }

        if (qual_a2_list != '') {
            query += '&qualifiche_a2=' + qual_a2_list + '';
        }

        var qual_l1_filter_elements = document.getElementsByClassName('qual_l1');

        var qual_l1_list = '';


        for (var i = 0; i < qual_l1_filter_elements.length; i++) {
            if (qual_l1_filter_elements[i].checked) {
                qual_l1_list += qual_l1_filter_elements[i].value + ',';
            }
        }

        if (qual_l1_list != '') {
            query += '&qualifiche_l1=' + qual_l1_list + '';
        }
        
        var qual_l2_filter_elements = document.getElementsByClassName('qual_l2');

        var qual_l2_list = '';


        for (var i = 0; i < qual_l2_filter_elements.length; i++) {
            if (qual_l2_filter_elements[i].checked) {
                qual_l2_list += qual_l_filter_elements[i].value + ',';
            }
        }

        if (qual_l2_list != '') {
            query += '&qualifiche_l2=' + qual_l2_list + '';
        }

        var qual_rdr1_filter_elements = document.getElementsByClassName('qual_rdr1');

        var qual_rdr1_list = '';


        for (var i = 0; i < qual_rdr1_filter_elements.length; i++) {
            if (qual_rdr1_filter_elements[i].checked) {
                qual_rdr1_list += qual_rdr1_filter_elements[i].value + ',';
            }
        }

        if (qual_rdr1_list != '') {
            query += '&qualifiche_rdr1=' + qual_rdr1_list + '';
        }
        
        var qual_rdr2_filter_elements = document.getElementsByClassName('qual_rdr2');

        var qual_rdr2_list = '';


        for (var i = 0; i < qual_rdr2_filter_elements.length; i++) {
            if (qual_rdr2_filter_elements[i].checked) {
                qual_rdr2_list += qual_rdr2_filter_elements[i].value + ',';
            }
        }

        if (qual_rdr2_list != '') {
            query += '&qualifiche_rdr2=' + qual_rdr2_list + '';
        }

        var qual_ap_filter_elements = document.getElementsByClassName('qual_ap');

        var qual_ap_list = '';


        for (var i = 0; i < qual_ap_filter_elements.length; i++) {
            if (qual_ap_filter_elements[i].checked) {
                qual_ap_list += qual_ap_filter_elements[i].value + ',';
            }
        }

        if (qual_ap_list != '') {
            query += '&qualifiche_ap=' + qual_ap_list + '';
        }



        var anno_filter_elements = document.getElementsByClassName('anno');

        var annolist = '';


        for (var i = 0; i < anno_filter_elements.length; i++) {
            if (anno_filter_elements[i].checked) {
                annolist += anno_filter_elements[i].value + ',';
            }
        }

        if (annolist != '') {
            query += '&anno=' + annolist + '';
        }


        var search_query = $('#search_textbox').value;

        query += '&search_filter=' + search_query + '';

        return query;
       
    }

    function remove_active_class(element) {
        for (var i = 0; i < element.length; i++) {
            if (element[i].matches('.active')) {
                element[i].classList.remove("active");
            }
        }
    }

    $('#clear_filter').onclick = function() {

        var territorio_elements = document.getElementsByClassName('territorio');

        for (var count = 0; count < territorio_elements.length; count++) {
            territorio_elements[count].checked = false;
        }

        var volo_filter_elements = document.getElementsByClassName('volo_filter');

        remove_active_class(volo_filter_elements);

        var qualifiche_filter_elements = document.getElementsByClassName('qualifiche_filter');

        for (var count = 0; count < qualifiche_filter_elements.length; count++) {
            qualifiche_filter_elements[count].checked = false;
        }

        $('#search_textbox').value = '';

        load_product(1, '');

    }

    $('#search_button').onclick = function() {

        var search_query = $('#search_textbox').value;

        if (search_query != '') {
            load_product(page = 1, make_query());
        }

    }
    
</script>