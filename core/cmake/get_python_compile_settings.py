import sys
import sysconfig
for var in ("CC", "BLDSHARED"):
    print ("message(STATUS \"Python{}_{}\ is\  {}\")" . format(sys.version_info.major, var, sysconfig.get_config_var(var)))
    print ("set(Python{}_{} \"{}\")" . format(sys.version_info.major, var, sysconfig.get_config_var(var)))

    # as these vars contain the compiler itself, we remove the first word and return it as _FLAGS
    print ("message(STATUS \"Python{}_{}_FLAGS\ is\  {}\")" . format(sys.version_info.major, var, sysconfig.get_config_var(var).split(' ',1)[1]))
    print ("set(Python{}_{}_FLAGS \"{}\")" . format(sys.version_info.major, var, sysconfig.get_config_var(var).split(' ',1)[1]))

for var in ("CFLAGS","CCSHARED","INCLUDEPY","LDFLAGS","EXT_SUFFIX"):
    print ("message(STATUS \"Python{}_{}\ is\  {}\")" . format(sys.version_info.major, var, sysconfig.get_config_var(var)))
    print ("set(Python{}_{} \"{}\")" . format(sys.version_info.major, var, sysconfig.get_config_var(var)))